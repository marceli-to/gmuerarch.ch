<?php
namespace App\Http\Controllers;
use App\Http\Controllers\BaseController;
use App\Models\TeamMember;
use App\Models\Job;
use App\Models\Topic;
use App\Models\Discourse;
use Illuminate\Http\Request;

class TestController extends BaseController
{
  public function __construct()
  {
    parent::__construct();
  }

  public function team()
  {
    dd(TeamMember::with('image')->get());
  }

  public function jobs()
  {
    dd(Job::with('files')->get());
  }

  public function topic(Topic $topic)
  {
    dd(Topic::find($topic->id));
  }

  public function discourseByTopic($slug)
  {
    // Get the topic first
    $topic = Topic::where('slug', 'like', '%"'.$slug.'"%')->firstOrFail();

    // Get the articles
    $articles = Discourse::query()->with('images', 'files', 'topics')
    ->whereHas('topics', function ($query) use ($topic) {
      $query->where('id', $topic->id);
    })->get();
    dd($articles);
  }
}
