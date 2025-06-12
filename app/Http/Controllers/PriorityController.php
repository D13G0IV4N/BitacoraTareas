<?php

namespace App\Http\Controllers;

use App\Models\Priority;
use Illuminate\Http\Request;



class PriorityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $priorities = Priority::orderBy('level')->get();
        return view('priorities.index', compact('priorities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('priorities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'  => 'required|string|unique:priorities,name',
            'level' => 'required|integer|min:1',
            'color' => 'required|string|size:7', // "#RRGGBB"
        ]);

        Priority::create($validated);

        return redirect()
            ->route('priorities.index')
            ->with('success', 'Prioridad creada correctamente');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Priority $priority)
    {
        return view('priorities.edit', compact('priority'));
    }

    /**
     * Update the specified resource in storage.
     */
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Priority $priority)
    {
        $priority->delete();

        return redirect()
            ->route('priorities.index')
            ->with('success', 'Prioridad eliminada correctamente');
    }
}
