<?php

namespace App\Http\Middleware;

use App\Models\Ticket;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class MyTicket
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $currentUser = Auth::user();
        $ticket = Ticket::findOrFail($request->id);
        if ($ticket->user_id !== $currentUser->id) {
            return response()->json([
                'error' => true,
                'message' => 'Data tidak ada'
            ],404);
        }
        return $next($request);
    }
}
