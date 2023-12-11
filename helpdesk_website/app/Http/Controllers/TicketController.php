<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Category;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class TicketController extends Controller
{
    public function index() {
        $tickets = Ticket::with('users_employee', 'users_department', 'categories', 'categories.department', 'statuses', 'reviews')->get();
        $totalNewTickets = $tickets->where('status_id', '1')->count();
        $totalAnsweredTickets = $tickets->where('status_id', '2')->count();
        $totalRepliedTickets = $tickets->where('status_id', '3')->count();
        $totalClosedTickets = $tickets->where('status_id', '4')->count();
        return Inertia::render('Admin/Ticket/Index', [
            'tickets' => $tickets,
            'totalNewTickets' => $totalNewTickets,
            'totalAnsweredTickets' => $totalAnsweredTickets,
            'totalRepliedTickets' => $totalRepliedTickets,
            'totalClosedTickets' => $totalClosedTickets,
        ]);
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

    public function navlink(){
        $tickets = Ticket::with('users_employee', 'users_department', 'categories', 'categories.department', 'statuses', 'reviews')->get();
        return Inertia::render('./Component/NavLink', [
            'tickets' => $tickets,
        ]);
    }

    public function formTicket() {
        $categories = Category::all();
        return Inertia::render('Ticket/Index', [
            'categories' => $categories,
        ]);
    }
}

