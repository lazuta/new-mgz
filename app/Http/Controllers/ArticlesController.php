<?php

namespace App\Http\Controllers;

use App\User;
use App\Files;
use App\Articles;
use App\RewiewersTypes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller
{
    public function show()
    {   
        $articles = Articles::all();
        
        return view('article.show', ['articles' => $articles]);
    }

    public function create()
    {
        $categories = RewiewersTypes::all();

        foreach($categories as $category)
        {     
            if(!empty($category->subsidiary))
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
        $categoryID = RewiewersTypes::find($request['category'])->first();

        $article = Articles::create([
            'title' => $request['title'],
            'user_id' => Auth::id(),
            'reviewers_types_id' => $categoryID->id,
        ]);

        Files::create([
            'file_path' => $path,
            'upload_at' => date('Y-m-d G:i:s'),
            'article_id' => $article->id
        ]);

        return redirect()->route('article.show');
    }
}
