<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\DataCollection;
use App\Models\TeamImage;
use Illuminate\Http\Request;

class TeamImageController extends Controller
{
  /**
   * Get a list of team images
   * 
   * @return \Illuminate\Http\Response
   */
  public function get()
  {
    return response()->json(TeamImage::with('images')->find(1));
  }

}

