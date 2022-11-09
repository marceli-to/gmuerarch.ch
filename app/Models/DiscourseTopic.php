<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Relations\Pivot;

class DiscourseTopic extends Pivot
{
  
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */

  protected $fillable = [
    'discourse_id',
    'topic_id'
  ];
}
