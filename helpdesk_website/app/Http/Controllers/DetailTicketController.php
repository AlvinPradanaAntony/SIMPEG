<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailTicket;
use App\Models\Ticket;
use App\Http\Resources\DetailTicketResource;
use Illuminate\Support\Facades\DB;

class DetailTicketController extends Controller
{
    public function index(){
        $tickets = DetailTicket::with(['tickets', 'users_employee', 'users_department', 'categories', 'statuses', 'reviews', 'levels'])->get();
        return DetailTicketResource::collection($tickets);
    }

    public function create(Request $request){
        $request->validate([
            'ticket_id' => 'required|integer',
            'question' => 'required|string',
        ]);
        $detail_tickets = DetailTicket::create([
            'ticket_id' => $request->input('ticket_id'),
            'question' => $request->input('question'),
        ]);
        return response()->json(['message' => 'DetailTicket created successfully', 'detail_tickets' => $$detail_tickets], 201);
    }
}

