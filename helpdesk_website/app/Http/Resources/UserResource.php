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
        return[
            'id' => $this->id,
            'nip' => $this->nip,
            'name' => $this->name,
            'gender' => $this->gender,
            'birth_place' => $this->birth_place,
            'birth_date' => $this->birth_date,
            'religion' => $this->religion,
            'marital_status' => $this->marital_status,
            'department' => $this->departments->department,
            'position' => $this->positions->position,
            'role_id' => $this->role_id,
            'role' => $this->roles->role,
            'phone' => $this->phone,
            'address' => $this->address,
            'email' => $this->email,
            'email_verified_at' => $this->email_verified_at,
            'profile_photo_path' => $this->profile_photo_path,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
