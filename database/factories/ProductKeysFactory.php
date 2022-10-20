<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\ProductUsers;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductKeys>
 */
class ProductKeysFactory extends Factory {
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition() {
    return [
      'product_id' => Product::factory(),
      'key' => Str::random(255),
      'claimed_by' => ProductUsers::factory(),
      'claimed_at' => now(),
      'expires_at' => now()->addYears(1),
      'last_check_at' => now(),
    ];
  }
}
