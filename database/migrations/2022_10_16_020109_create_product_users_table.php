<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductUsersTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('product_users', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->foreignUuid('product_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
      $table->string('name')->nullable();
      $table->string('email');
      $table->timestampsTz();
      $table->softDeletesTz();

      $table->index(['email', 'name']);
      $table->unique(['product_id', 'email']);
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('product_users');
  }
}
