<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf as PDF;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('name')->get();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|unique:categories,name',
            'description' => 'nullable|string',
        ]);

        $validated['created_by'] = Auth::id();

        Category::create($validated);

        return redirect()
            ->route('categories.index')
            ->with('success', 'Categoría creada correctamente');
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name'        => 'required|string|unique:categories,name,' . $category->id,
            'description' => 'nullable|string',
        ]);

        $category->update($validated);

        return redirect()
            ->route('categories.index')
            ->with('success', 'Categoría actualizada correctamente');
    }

    public function destroy(Category $category)
    {
        $category->delete(); // Soft delete
        return redirect()
            ->route('categories.index')
            ->with('success', 'Categoría eliminada correctamente');
    }

    // Método para generar el PDF general
    public function pdf()
    {
        $categories = Category::whereNull('deleted_at')->get();
        $now = Carbon::now();

        $pdf = PDF::loadView('categories.pdf', compact('categories', 'now'));
        return $pdf->download('categorias_' . $now->format('Ymd_His') . '.pdf');
    }

    //  Método show generar el PDF de una categoría específica
    public function show(Category $category)
    {
        $now = Carbon::now();

        if ($category->deleted_at) {
            return redirect()
                ->route('categories.index')
                ->with('error', 'No se puede mostrar una categoría eliminada.');
        }

        $pdf = PDF::loadView('categories.show', compact('category', 'now'));
        return $pdf->download('categoria_' . $category->id . '_' . $now->format('Ymd_His') . '.pdf');
    }
}
