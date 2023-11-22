<?php
namespace App\Console\Commands;
use Illuminate\Console\Command;
use App\Models\Project;

class AddFlag extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'add:flag';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Adds the flag is_project to all published projects';

  /**
   * Create a new command instance.
   *
   * @return void
   */
  public function __construct()
  {
    parent::__construct();
  }

  /**
   * Execute the console command.
   *
   * @return mixed
   */
  public function handle()
  {
    $projects = Project::flagged('isPublish')->get();
    foreach($projects as $project)
    {
      $project->flag('isProject');
    }
  }
}
