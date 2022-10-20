<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Products\Product
 *
 * @mixin \Eloquent
 */
class Product extends Model {
  use HasFactory, SoftDeletes, Uuids;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'host',
    'title',
    'logo',
    'description',
  ];

  /**
   * The attributes that should be cast.
   *
   * @var array<string, string>
   */
  protected $casts = [
    'created_at' => 'datetime',
    'updated_at' => 'datetime',
    'deleted_at' => 'datetime',
  ];

  public function keys() {
    return $this->hasMany(ProductKeys::class, 'product_id', 'id');
  }

  public function users() {
    return $this->hasMany(ProductUsers::class, 'product_id', 'id');
  }
}
