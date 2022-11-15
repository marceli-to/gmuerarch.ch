<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\DataCollection;
use App\Models\ImageGrid;
use App\Models\ImageGridItem;
use Illuminate\Http\Request;

class ImageGridController extends Controller
{

  /**
   * Get a list of grid items
   * 
   * @return \Illuminate\Http\Response
   */
  public function get()
  {
    $items = ImageGrid::get();
    return response()->json($items);
  }

  /**
   * Store a grid row and create 2 empty items
   *
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $imageGrid = ImageGrid::create([
      'layout' => $request->input('layout'),
      'gridable_type' => "App\Models\\" . $request->input('model.name'),
      'gridable_id' => $request->input('model.id'),
    ]);

    for($i = 0; $i < $request->input('items'); $i++)
    {
      ImageGridItem::create([
        'position' => $i,
        'image_grid_id' => $imageGrid->id
      ]);
    }

    return response()->json($imageGrid->with('items'));
  }

  /**
   * Update the order of the given grid rows
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */

  public function order(Request $request)
  {
    $items = $request->get('items');
    foreach($items as $item)
    {
      $i = ImageGrid::find($item['id']);
      $i->order = $item['order'];
      $i->save(); 
    }
    return response()->json('successfully updated');
  }

  /**
   * Remove a grid row with all attached items
   *
   * @param  ImageGrid $imageGrid
   * @return \Illuminate\Http\Response
   */
  public function destroy(ImageGrid $imageGrid)
  {
    $imageGrid = ImageGrid::with('imageGridItems')->find($imageGrid->id);
    foreach($imageGrid->imageGridItems as $item)
    {
      $item->delete();
    }
    $imageGrid->delete();
    return response()->json('successfully deleted');
  }
}
