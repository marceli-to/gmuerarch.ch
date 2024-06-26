<?php
namespace App\Http\Controllers;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class PrivacyController extends BaseController
{
  protected $viewPath = 'pages.privacy.';

  public function __construct()
  {
    parent::__construct();
  }

  /**
   * Show the worklist page
   *
   * @return \Illuminate\Http\Response
   */

  public function index()
  {
    return view($this->viewPath . 'index');
  }

}
