<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = [
        'file_path', 'upload_at', 'article_id', 'pdf_path'
    ];
    
    public function article()
    {
        return $this->belongsTo('App\Article', 'article_id', 'id');
    }
}
