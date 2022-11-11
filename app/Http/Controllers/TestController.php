<?php
namespace App\Http\Controllers;
use App\Http\Controllers\BaseController;
use App\Models\TeamMember;
use App\Models\Job;
use App\Models\Topic;
use App\Models\Discourse;
use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;

class TestController extends BaseController
{
  public function __construct()
  {
    parent::__construct();
  }

  /**
   * Team
   */
  public function team()
  {
    dd(TeamMember::with('image')->get());
  }

  /**
   * Jobs
   */
  public function jobs()
  {
    dd(Job::with('files')->get());
  }

  /**
   * Discourse (topic)
   */
  public function topic(Topic $topic)
  {
    dd(Topic::find($topic->id));
  }

  /**
   * Discourse
   */
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

  /**
   * Project (category)
   */
  public function category(Category $category)
  {
    dd(Category::find($category->id));
  }

  /**
   * Project (by category)
   */
  public function projectByCategory($slug)
  {
    // Get the category first
    $category = Category::where('slug', 'like', '%"'.$slug.'"%')->firstOrFail();

    // Get the articles
    $projects = Project::query()->with('images', 'categories')
    ->whereHas('categories', function ($query) use ($category) {
      $query->where('id', $category->id);
    })->get();
    dd($projects);
  }

  /**
   * Project (with grids)
   */
  public function projectGrids(Project $project)
  {
    dd($project->with('imageGrids')->find($project->id));
  }
}
