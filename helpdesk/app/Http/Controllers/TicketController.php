<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Level;
use App\Http\Resources\TicketResource;

class TicketController extends Controller
{
    public function index(){
        $tickets = Ticket::with(['users', 'categories', 'statuses', 'reviews', 'levels'])->get();
        return TicketResource::collection($tickets);
        // return view('tickets.index', compact('tickets'));
    }
}
