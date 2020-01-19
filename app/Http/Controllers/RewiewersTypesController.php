<?php

namespace App\Http\Controllers;

use App\RewiewersTypes;
use Illuminate\Http\Request;

class RewiewersTypesController extends Controller
{
    public function show()
    {
        $categories = RewiewersTypes::all();

        foreach($categories as $category)
        {     
            if(!empty($category->subsidiary))
            {
                $category->subcategoryTitle = RewiewersTypes::find($category->subsidiary)->title;
            }
        }
        
        return view('category.show', ['categories' => $categories]);
    }

    public function create()
    {
        $categories = RewiewersTypes::whereNull('subsidiary')->get();

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
            RewiewersTypes::create([
                'title' => $request['subcategory'],
                'subsidiary' => $request['category'],
            ]);
        } else {
            RewiewersTypes::create([
                'title' => $request['category'],
            ]);
        }

        return redirect()->route('category.show');
    }
}
