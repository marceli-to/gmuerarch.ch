<?php
namespace App\Models;
use App\Models\Base;
use Illuminate\Database\Eloquent\Model;

class ImageGridItem extends Base
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */

  protected $fillable = [
    'position',
    'project_id',
    'image_id',
    'image_grid_id'
  ];

  /**
   * The image that belongs to this image grid item.
   */
  
  public function image()
  {
    return $this->belongsTo(Image::class);
  }

  /**
   * The grid that belongs to this image grid item.
   */
  
  public function imageGrid()
  {
    return $this->belongsTo(ImageGrid::class);
  }

  /**
   * The project that belongs to this image grid item.
   */
  
  public function project()
  {
    return $this->belongsTo(Project::class);
  }

}
