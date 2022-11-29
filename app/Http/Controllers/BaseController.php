<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Category;
use Illuminate\Http\Request;

class BaseController extends Controller
{
  public function __construct()
  {
    $categories = Category::with('projects')->has('projects')->get();
    \View::share('project_categories', $categories);
    \View::share('project_active_category', $categories[0]);
  }
}
