<?php

namespace App\Http\Middleware;

use App\Models\Comments;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class MyComment
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        
        $currentUser = Auth::user();
        $comment = Comments::findOrFail($request->id);
        // dd($currentUser);
        if ($comment->user_id !== $currentUser->id) {
            return response()->json([
                'error' => true,
                'message' => 'Data tidak ada'
            ],404);
        }
        return $next($request);
    }
}
