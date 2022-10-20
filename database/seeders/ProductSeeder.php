<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductUsers;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder {
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    ProductUsers::factory(5)->recycle(Product::factory()->create())->hasKeys(3)->create();
  }
}
