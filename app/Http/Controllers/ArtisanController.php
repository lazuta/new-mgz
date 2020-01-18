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

    public function store()
    {

    }
}
