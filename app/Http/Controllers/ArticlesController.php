<?php

namespace App\Http\Controllers;

use App\User;
use App\File;
use App\Comment;
use App\Article;
use App\Reviewer;
use App\RewiewerType;
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

        $comments = Comment::where('reviews_id', $id)->orderBy('created_at','DESC')->get();
                
        return view('article.layout', ['article' => $article], ['comments' => $comments]);
    }

    public function create()
    {
        $categories = RewiewerType::all();

        foreach ($categories as $category)
        {     
            if (!empty($category->subsidiary))
            {
                $category->subcategoryTitle = RewiewerType::find($category->subsidiary)->title;
            }
        }

        return view('article.create', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category' => ['required'],
            'file' => ['required', 'mimes:docx,pdf,doc,html'],
        ],[
            'title.required' => 'Заголовок не может быть пустым.',
            'title.max' => 'Название статьи превышает 255 символов.',
            'category.required' => 'Категория не может быть пустой.',
            'file.required' => 'Выберите файл.',
            'file.mimes' => 'Недопустимый формат файла.',
        ]);

        $path = '/storage/' . $request->file('file')->store('files', 'public');
        $categoryID = RewiewerType::find($request['category']);

        $article = Article::create([
            'title' => $request['title'],
            'user_id' => Auth::id(),
            'reviewers_types_id' => $categoryID->id,
        ]);

        File::create([
            'file_path' => $path,
            'upload_at' => date('Y-m-d G:i:s'),
            'article_id' => $article->id,
            'pdf_path' => $path
        ]);

        Reviewer::create([
            'description' => $request['description'],
            'user_id' => Auth::id(),
            'article_id' => $article->id
        ]);

        return redirect()->route('article.show');
    }

    public function edit($id)
    {
        $article = Article::find($id);

        $categories = RewiewerType::all();

        foreach ($categories as $category)
        {     
            if (!empty($category->subsidiary))
            {
                $category->subcategoryTitle = RewiewerType::find($category->subsidiary)->title;
            }
        }

        return view('article.edit', ['article' => $article, 'categories' => $categories]);
    }

    public function save(Request $request, $id)
    {   
        if(!empty($request['file']))
        {
            $path = '/storage/' . $request->file('file')->store('files', 'public');

            File::create([
                'file_path' => $path,
                'article_id' => $id
            ]);
        }

        Article::find($id)->update([
            'title' => $request['title'],
            'reviewers_types_id' => $request['category']
        ]);

        Reviewer::where('article_id', $id)->update([
            'description' => $request['description']
        ]);

        return redirect()->route('article.showArticle', $id);
    }
}
