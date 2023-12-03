<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'user_id_employee' => $this->user_id_employee,
            'user_id_department' => $this->user_id_department,
            'name_employee' => $this->users_employee->name,
            'name_department' => $this->users_department->name,
            // 'level_name' => $this->users->levels->level_name,
            'status' => $this->statuses->status,
            'category_id' => $this->category_id,
            'subject' => $this->subject,
            'category' => $this->categories->category,
            'status_id' => $this->status_id,
            'review_id' => $this->review_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
