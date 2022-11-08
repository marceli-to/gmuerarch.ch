<?php
namespace App\Http\Controllers;
use App\Http\Controllers\BaseController;
use App\Models\TeamMember;
use Illuminate\Http\Request;

class TestController extends BaseController
{

  public function __construct()
  {
    parent::__construct();
  }

  public function team()
  {
    dd(TeamMember::with('image')->get());
  }

}
