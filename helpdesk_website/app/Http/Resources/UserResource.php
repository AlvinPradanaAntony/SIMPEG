<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nip' => $this->nip,
            'name' => $this->name,
            'position' => $this->positions? $this->positions->position : $this->positions,
            'email' => $this->email,
            'photoUrl' => $this->profile_photo_url,
        ];
    }
}
