<?php

namespace App\Http\Controllers;

use App\Articles;
use App\RewiewersTypes;
use Illuminate\Http\Request;

class ArtisanController extends Controller
{
    public function show()
    {
        return view('article.show');
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

        $path = '/storage/' + $request->file('file')->store('files', 'public');
        $categoryID = RewiewersTypes::find($request['category'])->get();

        Articles::create([
            'title' => $request['title'],
            'reviewers_types_id' => $categoryID,
        ]);
    }
}
