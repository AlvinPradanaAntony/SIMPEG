<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public function departments(){
        return $this->belongsTo(Department::class, 'department_id');
    }
    
    protected $fillable = [
        'category',
        'department_id',
    ];
}
