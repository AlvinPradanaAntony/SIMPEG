<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Review;
use App\Models\Status;
use App\Models\Ticket;
use App\Models\Category;
use App\Models\Department;
use App\Models\DetailTicket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::with(
            'user:id,name',
            'category:id,category,department_id',
            'category.department:id,department',
            'status:id,status',
            'comments',
            'comments.user:id,name'
        )->get();
        // $tickets = $tickets->map(function ($ticket) {
        //     $ticket['total_comments'] = $ticket->comments->count();
        //     return $ticket;
        // });
        if (request()->wantsJson()) {
            return response()->json([
                'error' => false,
                'message' => 'Ticket Berhasil Dimuat',
                'listTickets' => $tickets,
                'total_ticket' => $tickets->count(),
            ]);
        }
        return Inertia::render('Admin/Ticket/Index', [
            'tickets' => $tickets,
        ]);
    }

    public function show($id)
    {
        $ticket = Ticket::with(
            'user:id,name',
            'category:id,category,department_id',
            'category.department:id,department',
            'status:id,status',
            'comments',
            'comments.user:id,name'
        )->findOrFail($id);
        return response()->json([
            'error' => false,
            'message' => 'Ticket Berhasil Dimuat',
            'listTicket' => $ticket
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required|string',
            'description' => 'required|string',
            'category_id' => 'required|integer',
            // 'status_id' => 'required|integer',
        ]);

        // $request['user_id'] = Auth::user()->id;
        $ticket = Ticket::create([
            'subject' => $request->input('subject'),
            'description' => $request->input('description'),
            'user_id' => Auth::user()->id,
            'category_id' => $request->input('category_id'),
            'status_id' => 1,
        ]);
        if (request()->wantsJson()) {
            return response()->json([
                'error' => false,
                'message' => 'Ticket Berhasil Dibuat',
                'listTicket' => $ticket->loadMissing('user:id,name', 'category:id,category,department_id', 'category.department:id,department', 'status:id,status')
            ]);
        }
        return redirect()->route('admin.tiket')->with('success', 'Ticket created successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'subject' => 'required|string',
            'description' => 'required|string',
        ]);

        $ticket = Ticket::findOrFail($id);
        $ticket->update($request->all());
        if (request()->wantsJson()) {
            return response()->json([
                'error' => false,
                'message' => 'Ticket Berhasil Diupdate',
                'listTicket' => $ticket->loadMissing('user:id,name', 'category:id,category,department_id', 'category.department:id,department', 'status:id,status')
            ]);
        }
        return redirect()->route('formticket')->with('success', 'Ticket created successfully.');
    }

    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->delete();
        if (request()->wantsJson()) {
            return response()->json([
                'error' => false,
                'message' => 'Ticket Berhasil Dihapus',

            ]);
        }
        return Redirect::back()->with('success', 'Ticket deleted successfully');
    }

    // public function create()
    // {
    //     return Inertia::render('Admin/Ticket/Create', [
    //         'users_employee' => User::where('role_id', 1)->get(),
    //         'users_department' => User::where('role_id', 2)->get(),
    //         'category' => Category::all(),
    //         'status' => Status::all(),
    //         'review' => Review::all(),
    //     ]);
    // }
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'user_id_employee' => 'required|integer',
    //         'user_id_department' => 'required|integer',
    //         'subject' => 'required|string',
    //         'category_id' => 'required|integer',
    //         'status_id' => 'required|integer',
    //         'review_id' => 'required|integer'
    //     ]);

    //     Ticket::create([
    //         'user_id_employee' => $request->input('user_id_employee'),
    //         'user_id_department' => $request->input('user_id_department'),
    //         'subject' => $request->input('subject'),
    //         'category_id' => $request->input('category_id'),
    //         'status_id' => $request->input('status_id'),
    //         'review_id' => $request->input('review_id')
    //     ]);
    //     return redirect()->route('admin.tiket')->with('success', 'Ticket created successfully.');
    // }

    // public function storeEmployee(Request $request)
    // {
    //     $request->validate([
    //         'user_id_employee' => 'required|integer',
    //         'subject' => 'required|string',
    //         'category_id' => 'required|integer',
    //         'status_id' => 'required|integer',
    //         'ticket_id' => 'integer',
    //         'question' => 'required|string',
    //     ]);

    //     $ticket = Ticket::create([
    //         'user_id_employee' => $request->input('user_id_employee'),
    //         'user_id_department' =>  $request->input('user_id_department'),
    //         'subject' => $request->input('subject'),
    //         'category_id' => $request->input('category_id'),
    //         'status_id' => $request->input('status_id'),
    //         'review_id' =>  $request->input('review_id'),
    //     ]);

    //     $ticketId = $ticket->id;


    //     DetailTicket::create([
    //         'ticket_id' => $ticketId,
    //         'question' => $request->input('question')
    //     ]);
    //     return redirect()->route('formticket')->with('success', 'Ticket created successfully.');
    // }

    // public function indexDashboard()
    // {
    //     $tickets = Ticket::with('users_employee', 'users_department', 'categories', 'categories.department', 'statuses', 'reviews')->get();
    //     $newTickets = $tickets->where('status_id', '1')->count();
    //     $users_employee = User::where('role_id', '1')->get();
    //     $categories = Category::all();
    //     return Inertia::render('Admin/Index', [
    //         'tickets' => $tickets,
    //         'newTickets' => $newTickets,
    //         'users_employee' => $users_employee,
    //         'categories' => $categories,
    //     ]);
    // }

    // public function getAllTickets()
    // {
    //     $ticket = Ticket::with('users_employee', 'users_department', 'categories', 'categories.department', 'statuses', 'reviews')->get();
    //     $users = User::all();
    //     $categories = Category::all();
    //     $statuses = Status::all();
    //     $reviews = Review::all();
    //     $departments = Department::all();
    //     $tickets = [
    //         'ticket' => $ticket,
    //         'users' => $users,
    //         'categories' => $categories,
    //         'statuses' => $statuses,
    //         'reviews' => $reviews,
    //         'departments' => $departments,
    //     ];
    //     return $tickets;
    // }

    // public function edit($id)
    // {
    //     $ticket = Ticket::with('users_employee', 'users_department', 'categories', 'categories.department', 'statuses', 'reviews')->get();
    //     $users = User::all();
    //     $categories = Category::all();
    //     $statuses = Status::all();
    //     $reviews = Review::all();
    //     $departments = Department::all();
    //     $tickets = [
    //         'ticket' => $ticket,
    //         'users' => $users,
    //         'categories' => $categories,
    //         'statuses' => $statuses,
    //         'reviews' => $reviews,
    //         'departments' => $departments,
    //     ];
    //     return Inertia::render('Ticket/DetailTicket', [
    //         'tickets' => $tickets,
    //         'ticket' => Ticket::find($id),
    //         'canLogin' => Route::has('login'),
    //     ]);
    // }
}
