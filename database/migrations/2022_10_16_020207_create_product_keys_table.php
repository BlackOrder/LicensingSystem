<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductKeysTable extends Migration {
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up() {
    Schema::create('product_keys', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->foreignUuid('product_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
      $table->string('key');
      $table->string('token')->nullable();
      $table->integer('life')->default(12);
      $table->uuid('claimed_by')->nullable();
      $table->timestampTz('claimed_at')->nullable();
      $table->timestampTz('expires_at')->nullable();
      $table->timestampTz('last_check_at')->nullable()->index();
      $table->timestampsTz();
      $table->softDeletesTz();

      $table->foreign('claimed_by')->references('id')->on('product_users')->cascadeOnUpdate()->nullOnDelete();
      
      $table->index(['product_id', 'claimed_by', 'key', 'expires_at']);
      $table->unique(['product_id', 'key']);
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('product_keys');
  }
}
