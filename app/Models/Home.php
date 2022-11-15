<?php
namespace App\Models;
use App\Models\Base;
use Illuminate\Database\Eloquent\Model;

class Home extends Base
{

  protected $table = 'home';

  public function imageGrids()
  {
    return $this->morphMany(ImageGrid::class, 'gridable')->orderBy('order');
  }

}
