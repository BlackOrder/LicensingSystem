<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Products\ProductKeys
 *
 * @mixin \Eloquent
 */
class ProductKeys extends Model {
  use HasFactory, SoftDeletes, Uuids;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'product_id',
    'key',
    'life',
    'token',
    'claimed_by',
    'claimed_at',
    'expires_at',
    'last_check_at',
  ];

  /**
   * The attributes that should be cast.
   *
   * @var array<string, string>
   */
  protected $casts = [
    'claimed_at' => 'datetime',
    'expires_at' => 'datetime',
    'last_check_at' => 'datetime',
    'created_at' => 'datetime',
    'updated_at' => 'datetime',
    'deleted_at' => 'datetime',
  ];

  public function claimedBy() {
    return $this->hasOne(ProductUsers::class, 'id', 'claimed_by');
  }

  public function product() {
    return $this->belongsTo(Product::class, 'product_id', 'id');
  }
}
