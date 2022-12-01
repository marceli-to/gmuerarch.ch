<?php
namespace App\Http\Controllers;
use App\Http\Controllers\BaseController;
use App\Models\TeamMember;
use App\Models\TeamImage;
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

  /**
   * Show the team page
   *
   * @return \Illuminate\Http\Response
   */

  public function team()
  {
    $team = TeamMember::with('publishedImage')->flagged('isPublish')->orderBy('order')->get();
    $teamImage = TeamImage::with('publishedImage')->find(1);
    return view($this->viewPath . 'index', ['team' => $team, 'teamImage' => $teamImage, 'section' => 'team']);
  }


  /**
   * Show the cv of a teammember
   *
   * @param String $slug
   * @param TeamMember $teamMember
   * @return \Illuminate\Http\Response
   */

  public function cv($slug = NULL, TeamMember $teamMember)
  {
    $teamMember = TeamMember::with('publishedImage')->findOrFail($teamMember->id);
    return view($this->viewPath . 'index', ['teamMember' => $teamMember,  'section' => 'cv']);
  }

}
