<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\DataCollection;
use App\Models\Category;
use App\Http\Requests\CategoryStoreRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
  
  /**
   * Get a list of categories
   * 
   * @return \Illuminate\Http\Response
   */
  public function get()
  {
    return new DataCollection(Category::orderBy('title->de', 'ASC')->get());
  }

  /**
   * Get a single category
   * 
   * @param Category $category
   * @return \Illuminate\Http\Response
   */
  public function find(Category $category)
  {
    $category = Category::find($category->id);
    return response()->json($category);
  }

  /**
   * Store a newly created category
   *
   * @param  \Illuminate\Http\CategoryStoreRequest $request
   * @return \Illuminate\Http\Response
   */
  public function store(CategoryStoreRequest $request)
  { 
    $category = Category::create([
      'title' => [
        'de' => $request->input('title.de'),
        'en' => $request->input('title.en'),
      ]
    ]);
    return response()->json(['jobId' => $category->id]);
  }

  /**
   * Update a category for a given category
   *
   * @param Category $category
   * @param  \Illuminate\Http\CategoryStoreRequest $request
   * @return \Illuminate\Http\Response
   */
  public function update(Category $category, CategoryStoreRequest $request)
  {
    $category = Category::findOrFail($category->id);
    $this->handleI18n($category, $request);
    return response()->json('successfully updated');
  }

  /**
   * Remove a category
   *
   * @param  Category $category
   * @return \Illuminate\Http\Response
   */
  public function destroy(Category $category)
  {
    $category->delete();
    return response()->json('successfully deleted');
  }

  /**
   * Handle i18n for a category
   *
   * @param Category $category
   * @param Request $request
   * @return $category
   */  
  protected function handleI18n(Category $category, Request $request)
  {
    $category->setTranslation('title', 'de', $request->input('title.de'));
    $category->setTranslation('title', 'en', $request->input('title.en'));
    $category->save();
    return $category;
  }
}

