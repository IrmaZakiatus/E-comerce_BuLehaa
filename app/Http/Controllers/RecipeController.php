<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\View\View;

class RecipeController extends Controller
{
    public function index(): View
    {
        return view('recipes.index', [
            'recipes' => Recipe::where('is_active', true)->latest()->paginate(9),
        ]);
    }

    public function show(Recipe $recipe): View
    {
        abort_unless($recipe->is_active, 404);

        return view('recipes.show', compact('recipe'));
    }
}
