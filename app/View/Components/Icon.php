<?php
namespace App\View\Components;
use Illuminate\View\Component;

class Icon extends Component
{
  /**
   * Type
   *
   * @var string
   */
  public $type;

  /**
   * Style
   *
   * @var string
   */
  public $style;

  /**
   * Create a new component instance.
   *
   * @param $type
   * @return void
   */
  public function __construct($type = NULL, $style = NULL)
  {
    $this->type = $type;
    $this->style = $style;

  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\View\View|string
   */
  public function render()
  {
    return view('components.icon');
  }
}
