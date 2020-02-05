<?php

namespace App\Http\Controllers;

use App\User;
use App\Article;
use App\Reviewer;
use App\UserReviewer;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function show()
    {
        $users = User::all()->where('role', 'reviewer');

        return view('users.show', ['users' => $users]);
    }

    public function approve(Request $request, $id)
    {      
        User::find($id)->update(['reviewer' => true]);

        return redirect()->route('users.show');
    }

    public function denied(Request $request, $id)
    {
        User::find($id)->update([
            'reviewer' => false,
            'role' => 'author'
        ]);

        return redirect()->route('users.show');
    }

    public function appointment()
    {   
        $articles = Reviewer::all();

        $rewiewers = User::where('reviewer', true)->get();
       
        return view('users.appointment', [
            'articles' => $articles,
            'rewiewers' => $rewiewers
        ]);
    }
}
