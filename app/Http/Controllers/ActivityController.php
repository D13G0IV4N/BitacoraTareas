<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Category;
use App\Models\Priority;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivityController extends Controller
{
    public function index()
{
    // Solo mostramos actividades que no han sido eliminadas
    $activities = Activity::whereNull('deleted_at')->orderBy('due_at')->get();
    return view('activities.index', compact('activities'));
}

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        $priorities = Priority::orderBy('level')->get();
        $users = User::orderBy('name')->get();

        return view('activities.create', compact('categories', 'priorities', 'users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_at'    => 'required|date',
            'due_at'      => 'required|date|after_or_equal:start_at',
            'priority_id' => 'required|exists:priorities,id',
            'category_id' => 'required|exists:categories,id',
            'assigned_to' => 'nullable|exists:users,id',
        ]);

        $validated['created_by'] = Auth::id();

        Activity::create($validated);

        return redirect()->route('activities.index')->with('success', 'Actividad creada correctamente');
    }

    public function edit(Activity $activity)
    {
        $categories = Category::orderBy('name')->get();
        $priorities = Priority::orderBy('level')->get();
        $users = User::orderBy('name')->get();

        return view('activities.edit', compact('activity', 'categories', 'priorities', 'users'));
    }

    public function update(Request $request, Activity $activity)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_at'    => 'required|date',
            'due_at'      => 'required|date|after_or_equal:start_at',
            'priority_id' => 'required|exists:priorities,id',
            'category_id' => 'required|exists:categories,id',
            'assigned_to' => 'nullable|exists:users,id',
        ]);

        $activity->update($validated);

        return redirect()->route('activities.index')->with('success', 'Actividad actualizada correctamente');
    }

    public function destroy(Activity $activity)
{
    // Soft delete
    $activity->delete();

    return redirect()
        ->route('activities.index')
        ->with('success', 'Actividad eliminada correctamente');
}
    
}
