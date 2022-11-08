<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\DataCollection;
use App\Models\Job;
use App\Models\File;
use App\Http\Requests\JobStoreRequest;
use Illuminate\Http\Request;

class JobController extends Controller
{
  
  /**
   * Get a list of Jobs
   * 
   * @return \Illuminate\Http\Response
   */
  public function get()
  {
    return new DataCollection(Job::orderBy('order', 'ASC')->get());
  }

  /**
   * Get a single Job
   * 
   * @param Job $job
   * @return \Illuminate\Http\Response
   */
  public function find(Job $job)
  {
    $job = Job::with('files')->find($job->id);
    return response()->json($job);
  }

  /**
   * Store a newly created Job
   *
   * @param  \Illuminate\Http\JobStoreRequest $request
   * @return \Illuminate\Http\Response
   */
  public function store(JobStoreRequest $request)
  { 
    $job = Job::create($request->all());
    $this->handleI18n($job, $request);
    $this->handleFlag($job, 'isPublish', $request->input('publish'));
    $this->handleFiles($job, $request->input('files'));
    return response()->json(['jobId' => $job->id]);
  }

  /**
   * Update a Job for a given Job
   *
   * @param Job $job
   * @param  \Illuminate\Http\JobStoreRequest $request
   * @return \Illuminate\Http\Response
   */
  public function update(Job $job, JobStoreRequest $request)
  {
    $job = Job::findOrFail($job->id);
    $job->update($request->all());
    $this->handleI18n($job, $request);
    $this->handleFlag($job, 'isPublish', $request->input('publish'));
    $this->handleFiles($job, $request->input('files'));
    return response()->json('successfully updated');
  }

  /**
   * Toggle the status a given Job
   *
   * @param  Job $job
   * @return \Illuminate\Http\Response
   */
  public function toggle(Job $job)
  {
    if ($job->hasFlag('isPublish'))
    {
      $job->unflag('isPublish');
    }
    else
    {
      $job->flag('isPublish');
    } 
    return response()->json($job->hasFlag('isPublish'));
  }

  /**
   * Update the order the team jobs
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */

  public function order(Request $request)
  {
    $jobs = $request->get('jobs');
    foreach($jobs as $job)
    {
      $i = Job::find($job['id']);
      $i->order = $job['order'];
      $i->save(); 
    }
    return response()->json('successfully updated');
  }

  /**
   * Remove a Job
   *
   * @param  Job $job
   * @return \Illuminate\Http\Response
   */
  public function destroy(Job $job)
  {
    $job->delete();
    return response()->json('successfully deleted');
  }

  /**
   * Handle associated files
   *
   * @param Job $job
   * @param Array $files
   * @return void
   */  

  protected function handleFiles(Job $job, $files = NULL)
  {
    foreach($files as $file)
    {
      $f = File::findOrFail($file['id']);
      $f->fileable_id = $job->id;
      $f->fileable_type = Job::class;
      $f->save();
    }
  }

  /**
   * Handle flags of a team job
   *
   * @param Job $job
   * @param String $flag
   * @param Integer $value
   * @return Boolean
   */  
  protected function handleFlag(Job $job, $flag, $value)
  {
    if ($value == 1)
    {
      $job->flag($flag);
    }
    else
    {
      $job->unflag($flag);
    }
    return $job->hasFlag($flag);
  }

  /**
   * Handle state of a team job
   *
   * @param Job $job
   * @param Request $request
   * @return $job
   */  
  protected function handleI18n(Job $job, Request $request)
  {
    $job->setTranslation('title', 'de', $request->input('title.de'));
    $job->setTranslation('title', 'en', $request->input('title.en'));
    $job->setTranslation('description', 'de', $request->input('description.de'));
    $job->setTranslation('description', 'en', $request->input('description.en'));
    return $job;
  }
}

