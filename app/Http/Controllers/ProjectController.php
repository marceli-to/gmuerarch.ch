<?php
namespace App\Http\Controllers;
use App\Http\Controllers\BaseController;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends BaseController
{
  protected $viewPath = 'pages.project.';

  public function __construct()
  {
    parent::__construct();
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
    dd($project);
    return view($this->viewPath . 'show');
  }

}
