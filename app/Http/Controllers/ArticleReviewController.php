<?php

namespace App\Http\Controllers;

use App\File;
use App\ArticleReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleReviewController extends Controller
{
    public function review(Request $request)
    {
        if(!empty($request['file']))
        {
            $path = '/storage/' . $request->file('file')->store('files', 'public');

            $file = File::create([
                'file_path' => $path,
                'pdf_path' => $path,
                'article_id' => $request['article_id']
            ]);
        }

        ArticleReview::create([
            'reviews_id' => $request['reviewer_id'],
            'user_id' => Auth::id(),
            'file_id' => $file->id
        ]);
        
        return redirect()->back();
    }
}
