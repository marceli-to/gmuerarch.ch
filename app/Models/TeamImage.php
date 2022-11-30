<?php
namespace App\Models;
use App\Models\Base;
use Illuminate\Database\Eloquent\Model;

class TeamImage extends Base
{

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

}
