<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\DataCollection;
use App\Models\Discourse;
use App\Models\Topic;
use App\Models\File;
use App\Models\Image;
use App\Http\Requests\DiscourseStoreRequest;
use Illuminate\Http\Request;

class DiscourseController extends Controller
{
  
  /**
   * Get a list of discourses
   * 
   * @return \Illuminate\Http\Response
   */
  public function get()
  {
    return new DataCollection(Discourse::orderBy('order', 'ASC')->get());
  }

  /**
   * Get a single discourse
   * 
   * @param Discourse $discourse
   * @return \Illuminate\Http\Response
   */
  public function find(Discourse $discourse)
  {
    $discourse = Discourse::with('files', 'images', 'topics')->find($discourse->id);
    $topics = Topic::orderBy('title->de', 'ASC')->get();
    return response()->json(['article' => $discourse, 'topics' => $topics]);
  }

  /**
   * Store a newly created discourse
   *
   * @param  \Illuminate\Http\DiscourseStoreRequest $request
   * @return \Illuminate\Http\Response
   */
  public function store(DiscourseStoreRequest $request)
  { 
    $discourse = Discourse::create([
      'title' => [
        'de' => $request->input('title.de'),
        'en' => $request->input('title.en'),
      ],
      'link' => $request->input('link')
    ]);
    $discourse->topics()->attach($request->input('topic_ids'));
    $this->handleI18n($discourse, $request);
    $this->handleFlag($discourse, 'isPublish', $request->input('publish'));
    $this->handleFiles($discourse, $request->input('files'));
    $this->handleImages($discourse, $request->input('images'));
    return response()->json(['discourseId' => $discourse->id]);
  }

  /**
   * Update a discourse for a given discourse
   *
   * @param Discourse $discourse
   * @param  \Illuminate\Http\DiscourseStoreRequest $request
   * @return \Illuminate\Http\Response
   */
  public function update(Discourse $discourse, DiscourseStoreRequest $request)
  {
    $discourse = Discourse::findOrFail($discourse->id);
    $discourse->setTranslation('title', 'de', $request->input('title.de'));
    $discourse->setTranslation('title', 'en', $request->input('title.en'));
    $discourse->link = $request->input('link');
    $discourse->topics()->sync($request->input('topic_ids'));
    $discourse->save();

    $this->handleI18n($discourse, $request);
    $this->handleFlag($discourse, 'isPublish', $request->input('publish'));
    $this->handleFiles($discourse, $request->input('files'));
    $this->handleImages($discourse, $request->input('images'));
    return response()->json('successfully updated');
  }

  /**
   * Toggle the status a given discourse
   *
   * @param  Discourse $discourse
   * @return \Illuminate\Http\Response
   */
  public function toggle(Discourse $discourse)
  {
    if ($discourse->hasFlag('isPublish'))
    {
      $discourse->unflag('isPublish');
    }
    else
    {
      $discourse->flag('isPublish');
    } 
    return response()->json($discourse->hasFlag('isPublish'));
  }

  /**
   * Update the order the discourses
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */

  public function order(Request $request)
  {
    $articles = $request->get('articles');
    foreach($articles as $article)
    {
      $a = Discourse::find($article['id']);
      $a->order = $article['order'];
      $a->save(); 
    }
    return response()->json('successfully updated');
  }

  /**
   * Remove a discourse
   *
   * @param  Discourse $discourse
   * @return \Illuminate\Http\Response
   */
  public function destroy(Discourse $discourse)
  {
    $discourse->delete();
    return response()->json('successfully deleted');
  }

  /**
   * Handle associated files
   *
   * @param Discourse $discourse
   * @param Array $files
   * @return void
   */  

  protected function handleFiles(Discourse $discourse, $files = NULL)
  {
    foreach($files as $file)
    {
      $f = File::findOrFail($file['id']);
      $f->fileable_id = $discourse->id;
      $f->fileable_type = Discourse::class;
      $f->save();
    }
  }

  /**
   * Handle associated images
   *
   * @param Discourse $discourse
   * @param Array $images
   * @return void
   */  

  protected function handleImages(Discourse $discourse, $images = NULL)
  {
    foreach($images as $image)
    {
      $i = Image::findOrFail($image['id']);
      $i->imageable_id = $discourse->id;
      $i->imageable_type = Discourse::class;
      $i->save();
    }
  }

  /**
   * Handle flags of a discourse
   *
   * @param Discourse $discourse
   * @param String $flag
   * @param Integer $value
   * @return Boolean
   */  
  protected function handleFlag(Discourse $discourse, $flag, $value)
  {
    if ($value == 1)
    {
      $discourse->flag($flag);
    }
    else
    {
      $discourse->unflag($flag);
    }
    return $discourse->hasFlag($flag);
  }

  /**
   * Handle i18n of a discourse
   *
   * @param Discourse $discourse
   * @param Request $request
   * @return $discourse
   */  
  protected function handleI18n(Discourse $discourse, Request $request)
  {
    $discourse->setTranslation('text', 'de', $request->input('text.de'));
    $discourse->setTranslation('text', 'en', $request->input('text.en'));
    $discourse->save();
    return $discourse;
  }
}

