<?php
namespace App\Models;
use App\Models\Base;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Base
{
  use HasFactory, SoftDeletes, HasTranslations;

  protected $casts = [
    'created_at' => "datetime:d.m.Y",
    'caption' => 'array',
  ];

	protected $fillable = [
    'uuid',
    'name',
    'original_name',
    'extension',
    'size',
    'caption',
    'caption_de',
    'description',
    'orientation',
    'ratio',
		'coords_w',
    'coords_h',
    'coords_x',
    'coords_y',
    'order',
    'preview',
    'publish',
    'locked',
    'imageable_id',
    'imageable_type'
  ];

  /**
   * The model's default values for attributes.
   *
   * @var array
   */

   protected $attributes = [
    'caption' => '{
      "de": "null",
      "en": "null"
    }',
  ];

  /**
   * The attributes that are translatable.
   *
   * @var array
   */

   public $translatable = [
    'caption',
  ];

  /**
   * The accessors to append to the model's array form.
   *
   * @var array
   */

  protected $appends = [
    'coords',
  ];

  /**
   * Relationships
   * 
   */

  public function imageable()
  {
    return $this->morphTo();
  }

	/**
   * Scope for preview images
   */

	public function scopePreview($query)
	{
		return $query->where('preview', 1);
	}

	/**
   * Scope for published images
   */

	public function scopePublish($query)
	{
		return $query->where('publish', 1);
	}

	/**
   * Scope for locked images
   */

	public function scopeLocked($query)
	{
		return $query->where('locked', 1);
	}

	/**
	 * Get the cropping coordinates
	 *
	 * @return string
	 */

	public function getCoordsAttribute()
	{
    $coords = '0,0,0,0';
    if ($this->coords_w && $this->coords_h)
    {
      $coords = floor($this->coords_w) . ',' .  floor($this->coords_h) . ',' .  floor($this->coords_x) . ',' .  floor($this->coords_y);
    }
    return $coords;
  }
}
