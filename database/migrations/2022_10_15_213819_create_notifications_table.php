<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('notifications', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->string('type');
      $table->uuidMorphs('notifiable');
      $table->text('data');
      $table->timestampTz('read_at')->nullable();
      $table->timestampsTz();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('notifications');
  }
};
