<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Category extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];

    public function department() {
        return $this->belongsTo(Department::class);
    }
    public function tickets(){
        return $this->hasMany(Ticket::class);
    }
}
