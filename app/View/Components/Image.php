<?php
namespace App\View\Components;
use Illuminate\View\Component;

class Image extends Component
{
  /**
   * Image
   *
   * @var Object
   */
  public $image;

  /**
   * Maximum sizes for responsive images
   *
   * @var Array
   */
  public $maxSizes;

  /**
   * Width of the image
   *
   * @var String
   */
  public $width; 

  /**
   * Height of the image
   *
   * @var String
   */
  public $height; 

  /**
   * Visible state
   *
   * @var Boolean
   */
  public $visible; 

  /**
   * Overlay state
   *
   * @var Boolean
   */
  public $overlay; 

  /**
   * Project
   *
   * @var Object
   */
  public $project; 

  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($image = NULL, $maxSizes = [], $width = NULL, $height = NULL, $visible = TRUE, $overlay = FALSE, $project = NULL)
  {
    $this->image = $image;
    $this->maxSizes = $maxSizes;
    $this->width = $width;
    $this->height = $height;
    $this->visible = $visible;
    $this->overlay = $overlay;
    $this->project = $project;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\View\View|string
   */
  public function render()
  {
    return view('components.image');
  }
}
