<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DetailTicketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            // 'id' => $this->id,
            'ticket_id' => $this->ticket_id,
            'question' => $this->question,
            // 'answer' => $this->answer,
            // 'file_name' => $this->file_name,
            // 'file_data' => $this->file_data,
            
            'user_id_employee' => $this->tickets->user_id_employee,
            'user_id_department' => $this->tickets->user_id_department,
            'subject' => $this->tickets->subject,
            'category_id' => $this->tickets->category_id,
            'status_id' => $this->tickets->status_id,
            'review_id' => $this->tickets->review_id,
            
            // 'name_employee' => $this->tickets->users_employee->name,
            // 'name_department' => $this->tickets->users_department->name,
            // 'level_name' => $this->tickets->users_employee->levels->level_name,
            // 'status' => $this->tickets->statuses->status,
            // 'category' => $this->tickets->categories->category,
            // 'review' => $this->tickets->reviews->review,
        ];
    }
}
