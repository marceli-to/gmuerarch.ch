<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\DataCollection;
use App\Models\TeamMember;
use App\Models\Image;
use App\Http\Requests\TeamMemberStoreRequest;
use Illuminate\Http\Request;

class TeamMemberController extends Controller
{
  
  /**
   * Get a list of TeamMembers
   * 
   * @return \Illuminate\Http\Response
   */
  public function get()
  {
    return new DataCollection(TeamMember::orderBy('order', 'ASC')->get());
  }

  /**
   * Get a single TeamMember
   * 
   * @param TeamMember $teamMember
   * @return \Illuminate\Http\Response
   */
  public function find(TeamMember $teamMember)
  {
    $teamMember = TeamMember::with('images')->find($teamMember->id);
    return response()->json($teamMember);
  }

  /**
   * Store a newly created TeamMember
   *
   * @param  \Illuminate\Http\TeamMemberStoreRequest $request
   * @return \Illuminate\Http\Response
   */
  public function store(TeamMemberStoreRequest $request)
  { 
    $teamMember = TeamMember::create($request->all());
    $this->handleFlag($teamMember, 'isPublish', $request->input('publish'));
    $this->handleFlag($teamMember, 'isPostum', $request->input('postum'));
    $this->handleImages($teamMember, $request->input('images'));
    return response()->json(['teamMemberId' => $teamMember->id]);
  }

  /**
   * Update a TeamMember for a given TeamMember
   *
   * @param TeamMember $teamMember
   * @param  \Illuminate\Http\TeamMemberStoreRequest $request
   * @return \Illuminate\Http\Response
   */
  public function update(TeamMember $teamMember, TeamMemberStoreRequest $request)
  {
    $teamMember = TeamMember::findOrFail($teamMember->id);
    $teamMember->update($request->all());
    $this->handleI18n($teamMember, $request);
    $this->handleFlag($teamMember, 'isPublish', $request->input('publish'));
    $this->handleFlag($teamMember, 'isPostum', $request->input('postum'));
    $this->handleImages($teamMember, $request->input('images'));
    return response()->json('successfully updated');
  }

  /**
   * Toggle the status a given TeamMember
   *
   * @param  TeamMember $teamMember
   * @return \Illuminate\Http\Response
   */
  public function toggle(TeamMember $teamMember)
  {
    if ($teamMember->hasFlag('isPublish'))
    {
      $teamMember->unflag('isPublish');
    }
    else
    {
      $teamMember->flag('isPublish');
    } 
    return response()->json($teamMember->hasFlag('isPublish'));
  }

  /**
   * Update the order the team members
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */

  public function order(Request $request)
  {
    $members = $request->get('members');
    foreach($members as $member)
    {
      $i = TeamMember::find($member['id']);
      $i->order = $member['order'];
      $i->save(); 
    }
    return response()->json('successfully updated');
  }

  /**
   * Remove a TeamMember
   *
   * @param  TeamMember $teamMember
   * @return \Illuminate\Http\Response
   */
  public function destroy(TeamMember $teamMember)
  {
    $teamMember->delete();
    return response()->json('successfully deleted');
  }

  /**
   * Handle associated images
   *
   * @param TeamMember $teamMember
   * @param Array $images
   * @return void
   */  

  protected function handleImages(TeamMember $teamMember, $images = NULL)
  {
    foreach($images as $image)
    {
      $img = Image::findOrFail($image['id']);
      $img->imageable_id = $teamMember->id;
      $img->imageable_type = TeamMember::class;
      $img->save();
    }
  }

  /**
   * Handle flags of a team member
   *
   * @param TeamMember $teamMember
   * @param String $flag
   * @param Integer $value
   * @return Boolean
   */  
  protected function handleFlag(TeamMember $teamMember, $flag, $value)
  {
    if ($value == 1)
    {
      $teamMember->flag($flag);
    }
    else
    {
      $teamMember->unflag($flag);
    }
    return $teamMember->hasFlag($flag);
  }

  /**
   * Handle state of a team member
   *
   * @param TeamMember $teamMember
   * @param Request $request
   * @return $teamMember
   */  
  protected function handleI18n(TeamMember $teamMember, Request $request)
  {
    $teamMember->setTranslation('title', 'de', $request->input('title.de'));
    $teamMember->setTranslation('title', 'en', $request->input('title.en'));
    $teamMember->setTranslation('description', 'de', $request->input('description.de'));
    $teamMember->setTranslation('description', 'en', $request->input('description.en'));
    return $teamMember;
  }
}

