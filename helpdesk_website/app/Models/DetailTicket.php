<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTicket extends Model
{
    use HasFactory;

    public function tickets(){
        return $this->belongsTo(Ticket::class, 'ticket_id');
    }

    public function users_employee(){
        return $this->belongsTo(User::class, 'user_id_employee');
    }

    public function users_department(){
        return $this->belongsTo(User::class, 'user_id_department');
    }

    public function categories(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function statuses(){
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function reviews(){
        return $this->belongsTo(Review::class, 'review_id');
    }

    public function levels(){
        return $this->belongsTo(Level::class, 'role_id');
    }

    protected $fillable = [
        'question',
        'ticket_id'
    ];
}
