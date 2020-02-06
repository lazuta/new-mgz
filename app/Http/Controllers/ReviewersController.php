<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ReviewersController extends Controller
{
    public function articles()
    {
        $articles = Article::where('user_id', Auth::id())->get();
    }
}
