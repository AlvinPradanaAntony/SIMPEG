<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'comment' => 'required|string',
            'ticket_id' => 'required|integer|exists:tickets,id',
            // 'user_id' => 'required|integer',
        ]);
        // $request['user_id'] = Auth::user()->id;
        // $comments = Comments::create($request->all());
        $comments = Comments::create([
            'comment' => $request->input('comment'),
            'ticket_id' => $request->input('ticket_id'),
            'user_id' => Auth::user()->id,
        ]);
        return response()->json([
            'error' => false,
            'message' => 'Komentar Berhasil Ditambahkan',
            'listComments' => $comments->loadMissing('user:id,name')
        ]);
    }


    public function show(Comments $comments)
    {
        //
    }


    public function edit(Comments $comments)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'comment' => 'required|string',
        ]);
        $comment = Comments::findOrFail($id);
        $comment->update($request->only('comment'));
        return response()->json([
            'error' => false,
            'message' => 'Komentar Berhasil Diubah',
            'listComments' => $comment->loadMissing('user:id,name')
        ]);
    }

    public function destroy($id)
    {
        $comment = Comments::findOrFail($id);
        $comment->delete();
        return response()->json([
            'error' => false,
            'message' => 'Komentar Berhasil Dihapus',
        ]);
    }
}
