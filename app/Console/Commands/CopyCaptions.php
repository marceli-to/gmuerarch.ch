<?php
namespace App\Console\Commands;
use Illuminate\Console\Command;
use App\Models\Image;

class CopyCaptions extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'copy:captions';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Copy captions from caption_de to the translated format in caption';

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
    $images = Image::all();
    foreach ($images as $image) {
      $image->caption = [
        'de' => $image->caption_de,
        'en' => $image->caption_de,
      ];
      $image->save();
    }
  }
}
