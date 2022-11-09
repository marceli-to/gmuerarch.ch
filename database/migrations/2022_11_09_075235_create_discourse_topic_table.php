<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('discourse_topic', function (Blueprint $table) {
      $table->foreignId('discourse_id')->constrained();
      $table->foreignId('topic_id')->constrained();
      $table->primary(['discourse_id', 'topic_id']);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('discourse_topic');
  }
};
