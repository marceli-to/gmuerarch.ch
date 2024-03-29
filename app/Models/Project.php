<?php
namespace App\Models;
use App\Models\Base;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Spatie\ModelFlags\Models\Concerns\HasFlags;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Base
{
  use HasTranslations, SoftDeletes, HasFlags;

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  
  protected $casts = [
    'title' => 'array',
    'subtitle' => 'array',
    'abstract' => 'array',
    'text' => 'array',
    'text_worklist' => 'array',
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
    'subtitle' => '{
      "de": "null", "en": "null"
    }',
    'abstract' => '{
      "de": "null", "en": "null"
    }',
    'text' => '{
      "de": "null", "en": "null"
    }',
    'text_worklist' => '{
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
    'subtitle',
    'abstract',
    'text',
    'text_worklist'
  ];

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
   
	protected $fillable = [
    'title',
    'subtitle',
    'abstract',
    'text',
    'text_worklist',
    'order'
  ];

  /**
   * The accessors to append to the model's array form.
   *
   * @var array
   */

  protected $appends = [
    'publish',
    'is_worklist',
    'is_project',
    'category_ids'
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

  public function previewImage()
  {
    return $this->morphOne(Image::class, 'imageable')->where('preview', 1);
  }

  public function images()
  {
    return $this->morphMany(Image::class, 'imageable')->orderBy('order');
  }

  public function grids()
  {
    return $this->morphMany(Grid::class, 'gridable')->orderBy('order');
  }

  /**
   * The topics that belong to this discourse.
   */
  
  public function categories()
  {
    return $this->belongsToMany(Category::class);
  }

  /**
   * Get the publish attribute
   * 
   */

  public function getPublishAttribute()
  {
    return $this->hasFlag('isPublish') ? 1 : 0;    
  }

  /**
   * Get the is worklist attribute
   * 
   */

  public function getIsWorklistAttribute()
  {
    return $this->hasFlag('isWorklist') ? 1 : 0;    
  }

  /**
   * Get the is project attribute
   * 
   */

  public function getIsProjectAttribute()
  {
    return $this->hasFlag('isProject') ? 1 : 0;    
  }

  /**
   * Get array of ids from the m:n topic relationship
   *
   */

  public function getCategoryIdsAttribute()
  {
    return $this->categories->pluck('id');
  }

}
