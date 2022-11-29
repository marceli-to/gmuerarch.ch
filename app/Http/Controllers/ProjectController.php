<?php
namespace App\Http\Controllers;
use App\Http\Controllers\BaseController;
use App\Models\Project;
use App\Models\Category;
use Illuminate\Http\Request;

class ProjectController extends BaseController
{
  protected $viewPath = 'pages.project.';

  public function __construct()
  {
    parent::__construct();
  }

  /**
   * Show a list of projects
   *
   * @param String $category
   * @return \Illuminate\Http\Response
   */

  public function index($category = NULL)
  { 
    // Get all categories & all projects
    $categories = Category::with('projects')->has('projects')->get();
    $projects = Project::with('images', 'previewImage', 'categories')->flagged('isPublish')->get();

    // Get category from url
    if ($category)
    {
      $category = Category::where('slug', 'like', '%"'.$category.'"%')->firstOrFail();
      $projectsByCategory = Project::query()->with('images', 'previewImage', 'categories')
      ->whereHas('categories', function ($query) use ($category) {
        $query->where('id', $category->id);
      })->get();

    }

    return view(
      $this->viewPath . 'index', 
      [
        'projects' => $projects,
        'projects_by_category' => isset($projectsByCategory) ? $projectsByCategory : $projects,
        'project_active' =>  isset($projectsByCategory) ? $projectsByCategory[0] : $projects[0], 
        'project_active_category' => $category ? $category : $categories[0]
      ]
    );
  }

  /**
   * Show a single project by a given project
   *
   * @param String $slug
   * @param Project $project
   * @return \Illuminate\Http\Response
   */

  public function show($slug = NULL, Project $project)
  {
    $project = Project::findOrFail($project->id);
    return view($this->viewPath . 'show', ['project' => $project]);
  }

}
