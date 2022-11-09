<?php
namespace App\Http\Controllers;
use App\Http\Controllers\BaseController;
use App\Models\TeamMember;
use App\Models\Job;
use App\Models\Topic;
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

  public function jobs()
  {
    dd(Job::with('files')->get());
  }

  public function topic(Topic $topic)
  {
    dd(Topic::find($topic->id));
  }
}
