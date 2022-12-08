<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\DataCollection;
use App\Models\GridItem;
use Illuminate\Http\Request;

class GridItemController extends Controller
{

  /**
   * Store a grid item
   *
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */

  public function store(Request $request)
  {
    $imageGridItem = GridItem::find($request->input('id'));
    $imageGridItem->image_id = $request->input('image_id');
    $imageGridItem->project_id = $request->input('project_id');
    $imageGridItem->position = $request->input('position');
    $imageGridItem->save();
    return response()->json($imageGridItem);
  }

  /**
   * Reset a grid item
   *
   * @param  GridItem $imageGridItem
   * @return \Illuminate\Http\Response
   */
  public function reset(GridItem $imageGridItem)
  {
    $imageGridItem->image_id = NULL;
    $imageGridItem->save();
    return response()->json('successfully deleted');
  }

}
