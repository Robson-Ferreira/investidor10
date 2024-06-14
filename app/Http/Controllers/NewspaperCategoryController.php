<?php

namespace App\Http\Controllers;

use App\Models\Newspaper;
use App\Models\NewspaperCategory;
use Illuminate\Http\Request;

class NewspaperCategoryController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $category = new NewspaperCategory();
        $category->name = $request->name;
        $category->save();

       return response()->json(['success' => true, 'category' => $category]);
    }
}
