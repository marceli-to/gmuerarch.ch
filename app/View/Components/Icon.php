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
   * Create a new component instance.
   *
   * @param $type
   * @return void
   */
  public function __construct($type = NULL)
  {
    $this->type = $type;
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
