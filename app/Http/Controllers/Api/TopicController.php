<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\DataCollection;
use App\Models\Topic;
use App\Http\Requests\TopicStoreRequest;
use Illuminate\Http\Request;

class TopicController extends Controller
{
  
  /**
   * Get a list of topics
   * 
   * @return \Illuminate\Http\Response
   */
  public function get()
  {
    return new DataCollection(Topic::get());
  }

  /**
   * Get a single topic
   * 
   * @param Topic $topic
   * @return \Illuminate\Http\Response
   */
  public function find(Topic $topic)
  {
    $topic = Topic::find($topic->id);
    return response()->json($topic);
  }

  /**
   * Store a newly created topic
   *
   * @param  \Illuminate\Http\TopicStoreRequest $request
   * @return \Illuminate\Http\Response
   */
  public function store(TopicStoreRequest $request)
  { 
    $topic = Topic::create([
      'title' => [
        'de' => $request->input('title.de'),
        'en' => $request->input('title.en'),
      ]
    ]);
    return response()->json(['jobId' => $topic->id]);
  }

  /**
   * Update a topic for a given topic
   *
   * @param Topic $topic
   * @param  \Illuminate\Http\TopicStoreRequest $request
   * @return \Illuminate\Http\Response
   */
  public function update(Topic $topic, TopicStoreRequest $request)
  {
    $topic = Topic::findOrFail($topic->id);
    $this->handleI18n($topic, $request);
    return response()->json('successfully updated');
  }

  /**
   * Remove a topic
   *
   * @param  Topic $topic
   * @return \Illuminate\Http\Response
   */
  public function destroy(Topic $topic)
  {
    $topic->delete();
    return response()->json('successfully deleted');
  }

  /**
   * Handle i18n for a topic
   *
   * @param Topic $topic
   * @param Request $request
   * @return $topic
   */  
  protected function handleI18n(Topic $topic, Request $request)
  {
    $topic->setTranslation('title', 'de', $request->input('title.de'));
    $topic->setTranslation('title', 'en', $request->input('title.en'));
    return $topic;
  }
}

