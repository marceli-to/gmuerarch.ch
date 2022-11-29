<?php
namespace App\Http\Controllers;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class OfficeController extends BaseController
{
  protected $viewPath = 'pages.office.';

  public function __construct()
  {
    parent::__construct();
  }

  /**
   * Show the office page
   *
   * @return \Illuminate\Http\Response
   */

  public function index()
  {
    return view($this->viewPath . 'index');
  }

}
