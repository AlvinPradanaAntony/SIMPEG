<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Http\Resources\RoleResource;

class RoleController extends Controller
{
    public function index(){
        $roles = Role::all();
        return RoleResource::collection($roles);
    }
}
