<?php

namespace App\Http\Controllers;

use App\RewiewersTypes;
use Illuminate\Http\Request;

class RewiewersTypesController extends Controller
{
    public function show()
    {
        return view('category.show');
    }

    public function create()
    {
        return view('category.create');

    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category' => ['required', 'string', 'max:255'],
        ]);

        RewiewersTypes::create([
            'title' => $request['category'],
        ]);
    }
}
