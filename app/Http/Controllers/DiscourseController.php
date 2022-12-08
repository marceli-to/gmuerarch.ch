<?php
namespace App\Http\Controllers;
use App\Http\Controllers\BaseController;
use App\Models\Discourse;
use App\Models\Topic;
use Illuminate\Http\Request;

class DiscourseController extends BaseController
{
  protected $viewPath = 'pages.discourse.';

  public function __construct()
  {
    parent::__construct();
  }

  /**
   * Show the discourse page
   *
   * @param String $topic
   * @return \Illuminate\Http\Response
   */

  public function index($topic = NULL)
  {
    // Get topic
    $topic = $topic ? Topic::where('slug', 'like', '%"'.$topic.'"%')->firstOrFail() : Topic::with('discourses')->has('discourses')->first();
    
    // Get discourses
    $discourses = NULL;
    if ($topic)
    {
      $discourses = Discourse::query()->with('publishedImage', 'topics', 'publishedFile')
      ->whereHas('topics', function ($query) use ($topic) {
        $query->where('id', $topic->id);
      })->flagged('isPublish')->orderBy('order')->get();
    }


    return view(
      $this->viewPath . 'index', 
      [
        'discourses' => $discourses,
        'active_topic' => $topic
      ]
    );

    return view($this->viewPath . 'index');
  }

}
