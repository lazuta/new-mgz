<?php

namespace App\Http\Controllers;

use App\User;
use App\File;
use App\Article;
use App\RewiewersTypes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller
{
    public function show()
    {   
        $articles = Article::all();

        foreach ($articles as $article)
        {   
            if (empty($article->posted)) {
                $article->status = "Ожидает просмотра";
            } elseif($article->posted = 1) {
                $article->status = "Одобрено к публикации";
            } else {
                $article->status = "Не одобрено к публикации";
            }
        }
        
        return view('article.show', ['articles' => $articles]);
    }

    public function showArticle($id)
    {
        $article = Article::find($id);
        
        return view('article.layout', ['article' => $article]);
    }

    public function create()
    {
        $categories = RewiewersTypes::all();

        foreach ($categories as $category)
        {     
            if (!empty($category->subsidiary))
            {
                $category->subcategoryTitle = RewiewersTypes::find($category->subsidiary)->title;
            }
        }

        return view('article.create', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category' => ['required'],
            'file' => ['required', 'mimes:docx,pdf,doc,html']
        ],[
            'title.required' => 'Заголовок не может быть пустым.',
            'title.max' => 'Название статьи превышает 255 символов.',
            'category.required' => 'Категория не может быть пустой.',
            'file.required' => 'Выберите файл.',
            'file.mimes' => 'Недопустимый формат файла.'
        ]);

        $path = '/storage/' . $request->file('file')->store('files', 'public');
        $categoryID = RewiewersTypes::find($request['category']);

        $article = Article::create([
            'title' => $request['title'],
            'user_id' => Auth::id(),
            'reviewers_types_id' => $categoryID->id,
        ]);

        File::create([
            'file_path' => $path,
            'upload_at' => date('Y-m-d G:i:s'),
            'article_id' => $article->id
        ]);

        return redirect()->route('article.show');
    }
}
