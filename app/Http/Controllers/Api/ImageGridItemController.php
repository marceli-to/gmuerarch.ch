<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\DataCollection;
use App\Models\ImageGrid;
use App\Models\ImageGridItem;
use Illuminate\Http\Request;

class ImageGridItemController extends Controller
{

  /**
   * Store a grid item
   *
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */

  public function store(Request $request)
  {
    $imageGridItem = ImageGridItem::find($request->input('id'));
    $imageGridItem->image_id = $request->input('image_id');
    $imageGridItem->position = $request->input('position');
    $imageGridItem->save();
    return response()->json($imageGridItem);
  }

}
