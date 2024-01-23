<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function category(){
        return $this->hasMany(Category::class);
    }
    public function user(){
        return $this->hasMany(User::class);
    }
}
