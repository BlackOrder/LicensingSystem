<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TokenResource extends JsonResource {
  /**
   * Transform the resource into an array.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
   */
  public function toArray($request) {
    return [
      'id' => $this->id,
      'identifier' => $this->name,
      'owner' => $this->tokenable->email,
      'created_at' => $this->created_at->format('Y-m-d H:i:s'),
      'last_used_at' => optional($this->last_used_at)->format('Y-m-d H:i:s') ?? "NEVER",
      'plainTextToken' => $this->when($this->plainTextToken, $this->plainTextToken),
    ];
  }
}