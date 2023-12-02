<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Level;
use App\Http\Resources\LevelResource;

class LevelController extends Controller
{
    public function index(){
        $levels = Level::all();
        return LevelResource::collection($levels);
    }
}
