<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->paginate(5);
        return view('index', compact('articles'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('journalist', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id', 
        ]);

        $validated['user_id'] = auth()->id(); 

        Article::create($validated); 

        return redirect()->back()->with('success', 'Статья успешно создана!');
    }

    public function showByCategory($categoryId)
    {
        $articles = Article::where('category_id', $categoryId)->latest()->paginate(5);
        $category = Category::findOrFail($categoryId);
        return view('category', compact('articles', 'category'));
    }

    public function destroy($id)
    {
        if (auth()->user()->role->name === 'user') {
            abort(403, 'У вас нет прав для удаления статей.');
        }

        $article = Article::findOrFail($id);
        $article->delete();

        return redirect('/')->with('success', 'Статья удалена');
    }
}