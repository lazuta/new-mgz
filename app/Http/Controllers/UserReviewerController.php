<?php

namespace App\Http\Controllers;

use App\UserReviewer;
use Illuminate\Http\Request;

class UserReviewerController extends Controller
{
    public function approving(Request $request)
    {   
        $validatedData = $request->validate([
            'rewiewer' => ['required']
        ],[
            'rewiewer.required' => 'Выберите рецензента.'
        ]);

        UserReviewer::create([
            'user_id' => $request['rewiewer'],
            'reviewers_id' => $request['invisible']
        ]);

        return redirect()->back();
    }
}
