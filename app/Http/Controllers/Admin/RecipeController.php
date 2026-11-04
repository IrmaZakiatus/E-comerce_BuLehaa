<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Recipe;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class RecipeController extends Controller
{
    public function index(): View
    {
        return view('admin.recipes.index', [
            'recipes' => Recipe::latest()->paginate(10),
        ]);
    }

    public function create(): View
    {
        return view('admin.recipes.create', [
            'recipe' => new Recipe(['is_active' => true]),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validatedData($request);
        $data['slug'] = Str::slug($data['title']);
        $data['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('recipes', 'public');
        }

        Recipe::create($data);

        return redirect()->route('admin.recipes.index')->with('success', 'Resep berhasil ditambahkan.');
    }

    public function show(Recipe $recipe): View
    {
        return view('admin.recipes.show', compact('recipe'));
    }

    public function edit(Recipe $recipe): View
    {
        return view('admin.recipes.edit', compact('recipe'));
    }

    public function update(Request $request, Recipe $recipe): RedirectResponse
    {
        $data = $this->validatedData($request, $recipe);
        $data['slug'] = Str::slug($data['title']);
        $data['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('photo')) {
            if ($recipe->photo) {
                Storage::disk('public')->delete($recipe->photo);
            }
            $data['photo'] = $request->file('photo')->store('recipes', 'public');
        }

        $recipe->update($data);

        return redirect()->route('admin.recipes.index')->with('success', 'Resep berhasil diperbarui.');
    }

    public function destroy(Recipe $recipe): RedirectResponse
    {
        if ($recipe->photo) {
            Storage::disk('public')->delete($recipe->photo);
        }

        $recipe->delete();

        return redirect()->route('admin.recipes.index')->with('success', 'Resep berhasil dihapus.');
    }

    private function validatedData(Request $request, ?Recipe $recipe = null): array
    {
        $recipeId = $recipe?->id ?? 'NULL';

        return $request->validate([
            'title' => ['required', 'string', 'max:255', 'unique:recipes,title,' . $recipeId],
            'description' => ['nullable', 'string'],
            'ingredients' => ['required', 'string'],
            'steps' => ['required', 'string'],
            'cooking_time' => ['nullable', 'integer', 'min:1'],
            'photo' => ['nullable', 'image', 'max:2048'],
        ]);
    }
}
