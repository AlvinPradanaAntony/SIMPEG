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
            'ticket_id' => 'required|integer', // tambahin ini di migration 'ticket_id' => 'integer
            'subject' => 'required|string',
            'question' => 'required|string',
            'user_id_employee' => 'required|integer',
            'user_id_department' => 'required|integer',
            'category_id' => 'required|integer',
            'status_id' => 'required|integer',
            'review_id' => 'required|integer',
        ]);
        $detail_tickets = DetailTicket::create([
            'ticket_id' => $request->input('ticket_id'),
            'user_id_employee' => $request->input('user_id_employee'),
            'user_id_department' => $request->input('user_id_department'),
            'category_id' => $request->input('category_id'),
            'status_id' => $request->input('status_id'),
            'review_id' => $request->input('review_id'),
            'subject' => $request->input('subject'),
            'question' => $request->input('question'),
        ]);
        return response()->json(['message' => 'DetailTicket created successfully', 'detail_tickets' => $$detail_tickets], 201);
        // DB::transaction(function () use ($request) {
        //     // ... (kode sebelumnya)
        //     $tickets = Ticket::create([
        //         'user_id_employee' => $request->input('user_id_employee'),
        //         'user_id_department' => $request->input('user_id_department'),
        //         'category_id' => $request->input('category_id'),
        //         'status_id' => $request->input('status_id'),
        //         'review_id' => $request->input('review_id'),
        //         'subject' => $request->input('subject'),
        //     ]);

        //     $tickets->detail_tickets()->create([
        //         'ticket_id' => $tickets->id,
        //         'user_id_employee' => $request->input('user_id_employee'),
        //         'user_id_department' => $request->input('user_id_department'),
        //         'category_id' => $request->input('category_id'),
        //         'status_id' => $request->input('status_id'),
        //         'review_id' => $request->input('review_id'),
        //         'subject' => $request->input('subject'),
        //         'question' => $request->input('question'),
        //     ]);
        // });
    // return response()->json(['message' => 'Ticket and DetailTicket created successfully'], 201);
}

    // public function create(Request $request)
    // {
    //     $request->validate([
    //         'subject' => 'required|string',
    //         'question' => 'required|string',
    //         'user_id_employee' => 'required|integer',
    //         'user_id_department' => 'required|integer',
    //         'category_id' => 'required|integer',
    //         'status_id' => 'required|integer',
    //         'review_id' => 'required|integer',
    //         // 'subject' => 'required',
    //     ]);

    //     $ticket = DetailTicket::create([
    //         'subject' => $request->input('subject'),
    //         'question' => $request->input('question'),
    //         'user_id_employee' => $request->input('user_id_employee'),
    //         'user_id_department' => $request->input('user_id_department'),
    //         'category_id' => $request->input('category_id'),
    //         'status_id' => $request->input('status_id'),
    //         'review_id' => $request->input('review_id'),
    //         // 'subject' => $request->input('subject'),
    //     ]);

    //     return response()->json(['message' => 'TICKET created successfully', 'ticket' => $ticket], 201);
    // }    
}

