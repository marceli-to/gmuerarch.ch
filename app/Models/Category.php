<?php
namespace App\Models;
use Spatie\Sluggable\HasTranslatableSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  use HasTranslations, HasTranslatableSlug;

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  
  protected $casts = [
    'title' => 'array',
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

    'slug' => '{
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
    'slug',
  ];

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
   
	protected $fillable = [
    'title',
    'slug',
  ];

  /**
   * The courses that belong to this category
   */
  
  public function projects()
  {
    return $this->belongsToMany(Discourse::class);
  }

  /**
   * Get the options for generating the slug.
   */
  public function getSlugOptions() : SlugOptions
  {
    return SlugOptions::create()
      ->generateSlugsFrom('title')
      ->saveSlugsTo('slug');
  }

}
