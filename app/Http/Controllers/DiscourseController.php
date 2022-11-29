<?php
namespace App\Http\Controllers;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class DiscourseController extends BaseController
{
  protected $viewPath = 'pages.discourse.';

  public function __construct()
  {
    parent::__construct();
  }

  /**
   * Show the discourse page
   *
   * @return \Illuminate\Http\Response
   */

  public function index()
  {
    return view($this->viewPath . 'index');
  }

}
