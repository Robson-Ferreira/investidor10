<?php

namespace App\Http\Controllers;

use App\Models\Newspaper;
use App\Models\NewspaperCategory;
use Illuminate\Http\Request;

class NewspaperController extends Controller
{
    public function index(Request $request)
    {
        // $newspapers = Newspaper::all();
        $search = $request->query('search'); // Captura a query 'search' da URL

        // Query para buscar notícias baseado na categoria, título ou descrição
        $newspapers = Newspaper::query()
            ->when($search, function ($query, $search) {
                $query->whereHas('category', function ($query) use ($search) {
                    $query->where('name', 'like', "%$search%");
                })->orWhere('title', 'like', "%$search%")
                ->orWhere('description', 'like', "%$search%");
            })
            ->with('category') // Carrega a relação Category
            ->orderBy('created_at', 'desc') // Ordena por data de criação descendente
            ->paginate(10); // Paginação de resultados, 10 por página

        return view('newspaper.index', ['newspapers' => $newspapers, 'search' => $search]);
    }

    public function create()
    {
        $categories = NewspaperCategory::all();
        return view('newspaper.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'category_id' => 'required|exists:newspaper_category,id',
        ]);

        $newspaper = new Newspaper();
        $newspaper->title = $request->title;
        $newspaper->description = $request->description;
        $newspaper->category_id = $request->category_id;
        $newspaper->save();

        return redirect()->route('newspaper.index');
    }
}
