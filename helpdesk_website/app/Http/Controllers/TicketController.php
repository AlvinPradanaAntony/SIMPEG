<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Category;
use App\Models\User;
use App\Models\Status;
use App\Models\Review;
use App\Models\Department;
use App\Models\DetailTicket;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

class TicketController extends Controller
{
    public function index() {
        $tickets = Ticket::with('users_employee', 'users_department', 'categories', 'categories.department', 'statuses', 'reviews')->get();
        return Inertia::render('Admin/Ticket/Index', [
            'tickets' => $tickets,
        ]);
    }

    public function create() {
        return Inertia::render('Admin/Ticket/Create', [
            'users_employee' => User::where('role_id', 1)->get(),
            'users_department' => User::where('role_id', 2)->get(),
            'category' => Category::all(),
            'status' => Status::all(),
            'review' => Review::all(),
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'user_id_employee' => 'required|integer',
            'user_id_department' => 'required|integer',
            'subject' => 'required|string',
            'category_id' => 'required|integer',
            'status_id' => 'required|integer',
            'review_id' => 'required|integer'
        ]);

        Ticket::create([
            'user_id_employee' => $request->input('user_id_employee'),
            'user_id_department' => $request->input('user_id_department'),
            'subject' => $request->input('subject'),
            'category_id' => $request->input('category_id'),
            'status_id' => $request->input('status_id'),
            'review_id' => $request->input('review_id')
        ]);
        return redirect()->route('admin.tiket')->with('success', 'Ticket created successfully.');
    }

    public function storeEmployee(Request $request)
    {
        $request->validate([
            'user_id_employee' => 'required|integer',
            'subject' => 'required|string',
            'category_id' => 'required|integer',
            'status_id' => 'required|integer',
        ]);

        Ticket::create([
            'user_id_employee' => $request->input('user_id_employee'),
            'subject' => $request->input('subject'),
            'category_id' => $request->input('category_id'),
            'status_id' => $request->input('status_id'),
        ]);
        return redirect()->route('formticket')->with('success', 'Ticket created successfully.');
    }

    public function storeEmployees(Request $request)
    {
        $request->validate([
            'ticket_id' => 'required|integer',
            'question' => 'required|string',
        ]);
        DetailTicket::create([
            'ticket_id' => $request->input('ticket_id'),
            'question' => $request->input('question')
        ]);
        return redirect()->route('formtickets')->with('success', 'Ticket created successfully.');
    }

    public function getLastTicketId(){
        $lastTicket = Ticket::max('id');
        return response()->json(['last_ticket_id' => $lastTicket]);
    }

    public function indexDashboard(){
        $tickets = Ticket::with('users_employee', 'users_department', 'categories', 'categories.department', 'statuses', 'reviews')->get();
        $newTickets = $tickets->where('status_id', '1')->count();
        $users_employee = User::where('role_id', '1')->get();
        $categories = Category::all();
        return Inertia::render('Admin/Index', [
            'tickets' => $tickets,
            'newTickets' => $newTickets,
            'users_employee' => $users_employee,
            'categories' => $categories,
        ]);
    }

    public function getAllTickets() {
        $ticket = Ticket::with('users_employee', 'users_department', 'categories', 'categories.department', 'statuses', 'reviews')->get();
        $users = User::all();
        $categories = Category::all();
        $statuses = Status::all();
        $reviews = Review::all();
        $departments = Department::all();
        $tickets = [
            'ticket' => $ticket,
            'users' => $users,
            'categories' => $categories,
            'statuses' => $statuses,
            'reviews' => $reviews,
            'departments' => $departments,
        ];
        return $tickets;
    }

    public function edit($id){
        $ticket = Ticket::with('users_employee', 'users_department', 'categories', 'categories.department', 'statuses', 'reviews')->get();
        $users = User::all();
        $categories = Category::all();
        $statuses = Status::all();
        $reviews = Review::all();
        $departments = Department::all();
        $tickets = [
            'ticket' => $ticket,
            'users' => $users,
            'categories' => $categories,
            'statuses' => $statuses,
            'reviews' => $reviews,
            'departments' => $departments,
        ];
        return Inertia::render('Ticket/DetailTicket', [
            'tickets' => $tickets,
            'ticket' => Ticket::find($id),
            'canLogin' => Route::has('login'),
        ]);
    }

    public function destroy($id) {
        $ticket = Ticket::find($id);
        $ticket->delete();
        return Redirect::back()->with('success', 'Ticket deleted successfully');
    }
}