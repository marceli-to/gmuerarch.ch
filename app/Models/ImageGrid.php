<?php
namespace App\Models;
use App\Models\Base;
use Illuminate\Database\Eloquent\Model;

class ImageGrid extends Base
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */

  protected $fillable = [
    'layout',
    'order',
    'gridable_id',
    'gridable_type'
  ];

  
  /*
  |--------------------------------------------------------------------------
  | Relationships
  |--------------------------------------------------------------------------
  |
  |
  */

  public function imageGridItems()
  {
    return $this->hasMany(ImageGridItem::class);
  }

}
