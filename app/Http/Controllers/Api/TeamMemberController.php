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
    $this->handleState($teamMember, $request->input('publish'));
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
    $this->handleState($teamMember, $request->input('publish'));
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
    if ($teamMember->hasFlag('isPublished'))
    {
      $teamMember->unflag('isPublished');
    }
    else
    {
      $teamMember->flag('isPublished');
    } 
    return response()->json($teamMember->hasFlag('isPublished'));
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
   * Handle state of a team member
   *
   * @param TeamMember $teamMember
   * @param Integer $state
   * @return Boolean
   */  
  protected function handleState(TeamMember $teamMember, $state)
  {
    if ($state == 1)
    {
      $teamMember->flag('isPublished');
    }
    else
    {
      $teamMember->unflag('isPublished');
    }
    return $teamMember->hasFlag('isPublished');
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

