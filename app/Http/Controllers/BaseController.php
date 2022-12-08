<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Category;
use App\Models\Discourse;
use App\Models\Topic;
use Illuminate\Http\Request;

class BaseController extends Controller
{
  public function __construct()
  {
    $categories = Category::with('projects')->has('projects')->get();
    \View::share('project_categories', $categories);
    \View::share('projectActiveCategory', isset($categories[0]) ? $categories[0] : null);

    $topics = Topic::with('discourses')->has('discourses')->get();
    \View::share('discourse_topics', $topics);
    \View::share('discourse_active_topic', isset($topics[0]) ? $topics[0] : null);
  }
}
