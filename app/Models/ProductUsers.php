<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Products\ProductUsers
 *
 * @mixin \Eloquent
 */
class ProductUsers extends Model {
  use HasFactory, SoftDeletes, Uuids;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'product_id',
    'name',
    'email',
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
    return $this->hasMany(ProductKeys::class, 'claimed_by', 'id');
  }

  public function product() {
    return $this->belongsTo(Product::class, 'product_id', 'id');
  }
}
