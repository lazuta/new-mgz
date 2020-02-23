<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Reviewer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function show() 
    {
    }

    public function store(Request $request)
    {   
        $request->validate([
            'comment' => ['required', 'string', 'max:255']
        ],[
            'comment.required' => 'Комментарий не может быть пустым.',
            'comment.max' => 'Комментарий превышает 255 символов.'
        ]);
           
        $approved = NULL;

        if (!empty($request['approved']) || $request['approved'] !== 2)
            $approved = $request['approved'];
        
        Comment::create([
            'body' => $request['comment'],
            'approved' => $approved,
            'reviews_id' => $request['id'],
            'user_id' => Auth::id()
        ]);

        Reviewer::find($request['id'])->update(['mark' => $request['mark']]);
        
        return redirect()->back();
    }
}
