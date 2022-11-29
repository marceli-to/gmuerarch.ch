<?php
namespace App\View\Components;
use App\Models\Project;
use Illuminate\View\Component;

class ProjectPreviewImages extends Component
{
  /**
   * Projects
   *
   * @var Collection
   */
  public $projects;

  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($projects = NULL)
  {
    $this->projects = $projects;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\View\View|string
   */
  public function render()
  {
    return view('components.project.preview-images');
  }
}
