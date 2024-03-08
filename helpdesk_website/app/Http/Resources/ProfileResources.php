<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResources extends JsonResource
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
            'gender' => $this->gender,
            'birth_place' => $this->birth_place,
            'birth_date' => $this->birth_date,
            'religion' => $this->religion,
            'marital_status' => $this->marital_status,
            'phone' => $this->phone,
            'address' => $this->address,
            'email' => $this->email,
            'profile_photo_url' => $this->profile_photo_url,
        ];
    }
}
