<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;
use App\Http\Resources\StatusResource;

class StatusController extends Controller
{
    public function index(){
        $statuses = Status::all();
        return StatusResource::collection($statuses);
    }
}
