<?php
namespace App\Models;
use App\Models\Base;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\ModelFlags\Models\Concerns\HasFlags;
use Illuminate\Database\Eloquent\SoftDeletes;

class TeamMember extends Base
{
  use HasTranslations, SoftDeletes, HasFlags;

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  
  protected $casts = [
    'title' => 'array',
    'text' => 'array',
  ];

  /**
   * The model's default values for attributes.
   *
   * @var array
   */

  protected $attributes = [
    'title' => '{
      "de": "null", "en": "null"
    }',

    'text' => '{
      "de": "null", "en": "null"
    }',

  ];
  
  /**
   * The attributes that are translatable.
   *
   * @var array
   */

  public $translatable = [
    'title',
    'text',
  ];

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
   
	protected $fillable = [
    'title',
    'text',
    'link',
  ];

  /**
   * The accessors to append to the model's array form.
   *
   * @var array
   */

  protected $appends = [
    'publish',
  ];

  /*
  |--------------------------------------------------------------------------
  | Relationships
  |--------------------------------------------------------------------------
  |
  |
  */

  /**
   * The images that belong to this discourse.
   */

  public function image()
  {
    return $this->morphOne(Image::class, 'imageable');
  }

  public function publishedImage()
  {
    return $this->morphOne(Image::class, 'imageable')->where('publish', 1);
  }

  public function images()
  {
    return $this->morphMany(Image::class, 'imageable');
  }

  /**
   * The files that belong to this discourse.
   */

  public function file()
  {
    return $this->morphOne(File::class, 'fileable');
  }


  public function publishedFile()
  {
    return $this->morphOne(File::class, 'fileable')->where('publish', 1);
  }

  public function files()
  {
    return $this->morphMany(File::class, 'fileable');
  }

  /**
   * The topics that belong to this discourse.
   */
  
  public function topics()
  {
    return $this->belongsToMany(Topic::class);
  }

  /**
   * Get the publish attribute
   * 
   */

  public function getPublishAttribute()
  {
    return $this->hasFlag('isPublish') ? 1 : 0;    
  }

}
