<?php

namespace App\Http\Controllers;

use App\Models\Priority;
use Illuminate\Http\Request;

class PriorityController extends Controller
{
    public function index()
    {
        $priorities = Priority::orderBy('level')->get();
        return view('priorities.index', compact('priorities'));
    }

    public function create()
    {
        return view('priorities.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'  => 'required|string|unique:priorities,name',
            'level' => 'required|integer|min:1',
            'color' => 'required|string|size:7',
        ]);

        Priority::create($validated);

        return redirect()
            ->route('priorities.index')
            ->with('success', 'Prioridad creada correctamente');
    }

    public function edit(Priority $priority)
    {
        return view('priorities.edit', compact('priority'));
    }

    public function update(Request $request, Priority $priority)
    {
        $validated = $request->validate([
            'name'  => 'required|string|unique:priorities,name,' . $priority->id,
            'level' => 'required|integer|min:1',
            'color' => 'required|string|size:7',
        ]);

        $priority->update($validated);

        return redirect()
            ->route('priorities.index')
            ->with('success', 'Prioridad actualizada correctamente');
    }

    public function destroy(Priority $priority)
    {
        $priority->delete(); // Soft delete
        return redirect()
            ->route('priorities.index')
            ->with('success', 'Prioridad eliminada correctamente');
    }
}
