<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    public function users_employee(){
        return $this->belongsTo(User::class, 'user_id_employee');
    }

    public function users_department(){
        return $this->belongsTo(User::class, 'user_id_department');
    }

    public function categories(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function department()
    {
        return $this->belongsToThrough(Department::class, Category::class, 'id', 'id', 'category_id', 'department_id');
    }
    public function statuses(){
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function reviews(){
        return $this->belongsTo(Review::class, 'review_id');
    }

    public function roles(){
        return $this->belongsTo(Role::class, 'role_id');
    }

    protected $fillable = [
        'subject',
        'user_id_employee',
        'user_id_department',
        'category_id',
        'status_id',
        'review_id',
    ];
}
