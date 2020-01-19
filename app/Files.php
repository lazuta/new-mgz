<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    protected $fillable = [
        'file_path  ', 'upload_at ', 'article_id'
    ];
}
