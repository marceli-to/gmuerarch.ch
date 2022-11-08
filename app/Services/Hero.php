<?php
namespace App\Services;
use App\Models\HeroImage;
use Illuminate\Http\Request;

class Hero
{ 
  /**
   * Get hero images by slug
   * 
   * @param String $slug
   * @param Boolean $random
   */
  public function get($slug = NULL, $random = FALSE)
  {
    $hero = HeroImage::where('slug', $slug)->with('publishedImages')->get()->first();
    if ($hero && $hero->publishedImages->count() > 0)
    {
      return $hero->publishedImages->random(1)->first();
    }
    return NULL;
  }
}
