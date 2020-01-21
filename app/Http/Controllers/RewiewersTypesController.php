<?php

namespace App\Http\Controllers;

use App\RewiewerType;
use Illuminate\Http\Request;

class RewiewersTypesController extends Controller
{
    public function show()
    {
        $categories = RewiewerType::all();

        foreach($categories as $category)
        {     
            if(!empty($category->subsidiary))
            {
                $category->subcategoryTitle = RewiewerType::find($category->subsidiary)->title;
            }
        }
        
        return view('category.show', ['categories' => $categories]);
    }

    public function create()
    {
        $categories = RewiewerType::whereNull('subsidiary')->get();

        return view('category.create', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category' => ['required', 'string', 'max:255'],
        ], [
            'category.required' => 'Название категории не может быть пустым.',
            'category.max' => 'Название категории превышает 255 символов.'
        ]);

        if(isset($request['subcategory']))
        {
            RewiewerType::create([
                'title' => $request['subcategory'],
                'subsidiary' => $request['category'],
            ]);
        } else {
            RewiewerType::create([
                'title' => $request['category'],
            ]);
        }

        return redirect()->route('category.show');
    }
}
