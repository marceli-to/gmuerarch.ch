<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\DataCollection;
use App\Models\JobImage;
use Illuminate\Http\Request;

class JobImageController extends Controller
{
  /**
   * Get a list of team images
   * 
   * @return \Illuminate\Http\Response
   */
  public function get()
  {
    return response()->json(JobImage::with('images')->find(1));
  }

}

