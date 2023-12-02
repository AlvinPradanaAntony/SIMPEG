<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Level;
use App\Http\Resources\TicketResource;

class TicketController extends Controller
{
    public function index(){
        $tickets = Ticket::with(['users_employee', 'users_department', 'categories', 'statuses', 'reviews', 'levels'])->get();
        return TicketResource::collection($tickets);
    }

    public function getLastTicketId(){
        $lastTicketId = Ticket::latest('id')->value('id');
        return response()->json(['last_ticket_id' => $lastTicketId]);
    }

    public function create(Request $request)
    {
        $request->validate([
            // 'ticket_id' => 'required|integer',
            'user_id_employee' => 'required|integer',
            'user_id_department' => 'required|integer',
            'category_id' => 'required|integer',
            'status_id' => 'required|integer',
            'review_id' => 'required|integer',
            'subject' => 'required|string',
        ]);

        $ticket = Ticket::create([
            // 'ticket_id' => $request->input('ticket_id'),
            'user_id_employee' => $request->input('user_id_employee'),
            'user_id_department' => $request->input('user_id_department'),
            'category_id' => $request->input('category_id'),
            'status_id' => $request->input('status_id'),
            'review_id' => $request->input('review_id'),
            'subject' => $request->input('subject'),
        ]);
        return response()->json(['message' => 'TICKET created successfully', 'ticket' => $ticket], 201);
    }    
}

