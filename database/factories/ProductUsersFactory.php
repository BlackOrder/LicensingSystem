<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductUsers>
 */
class ProductUsersFactory extends Factory {
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition() {
    return [
      'name' => fake()->name(),
      'email' => fake()->unique()->safeEmail(),
      'product_id' => Product::factory(),
    ];
  }
}
