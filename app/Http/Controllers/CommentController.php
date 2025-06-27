<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index()
    {
        // Traer solo comentarios no eliminados con relaciones para mostrar
        $comments = Comment::with(['activity', 'user'])
                    ->whereNull('deleted_at')
                    ->orderBy('commented_at', 'desc')
                    ->get();

        return view('comments.index', compact('comments'));
    }

    public function create()
    {
        // Para crear un comentario hay que seleccionar actividad y usuario (o usar el auth)
        $activities = Activity::all();
        $users = \App\Models\User::all();

        return view('comments.create', compact('activities', 'users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'activity_id' => 'required|exists:activities,id',
            'user_id'     => 'required|exists:users,id',
            'comment'     => 'required|string',
        ]);

        $validated['commented_at'] = now();

        Comment::create($validated);

        return redirect()->route('comments.index')->with('success', 'Comentario creado correctamente');
    }

    public function edit(Comment $comment)
    {
        $activities = Activity::all();
        $users = \App\Models\User::all();

        return view('comments.edit', compact('comment', 'activities', 'users'));
    }

    public function update(Request $request, Comment $comment)
    {
        $validated = $request->validate([
            'activity_id' => 'required|exists:activities,id',
            'user_id'     => 'required|exists:users,id',
            'comment'     => 'required|string',
        ]);

        $validated['edited_at'] = now();

        $comment->update($validated);

        return redirect()->route('comments.index')->with('success', 'Comentario actualizado correctamente');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete(); // borrado lógico

        return redirect()->route('comments.index')->with('success', 'Comentario eliminado correctamente');
    }
}
