<?php

namespace App\Http\Controllers;

use App\Models\Priority;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Carbon\Carbon;

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

    // Método para generar PDF con todas las prioridades activas (no soft deleted)
    public function pdf()
    {
        $priorities = Priority::whereNull('deleted_at')->orderBy('level')->get();
        $now = Carbon::now();

        $pdf = PDF::loadView('priorities.pdf', compact('priorities', 'now'));
        return $pdf->download('prioridades_' . $now->format('Ymd_His') . '.pdf');
    }
    public function show(Priority $priority)
{
    $now = Carbon::now();

    if ($priority->deleted_at) {
        return redirect()
            ->route('priorities.index')
            ->with('error', 'No se puede mostrar una prioridad eliminada.');
    }

    $pdf = PDF::loadView('priorities.show', compact('priority', 'now'));
    return $pdf->download('prioridad_' . $priority->id . '_' . $now->format('Ymd_His') . '.pdf');
}
}
