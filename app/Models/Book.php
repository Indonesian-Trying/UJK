<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    
    use SoftDeletes, HasFactory;
    protected $fillable = [
        'title',
        'writer',
        'publishes',
        'year',
        'synop',
        'img',
        'pdf',
        'isbn',
        'category',
    ];

    public function publish() : BelongsTo {
        return $this->belongsTo(Publish::class, 'publishes');
    }
    public function category() : BelongsTo {
        return $this->belongsTo(Category::class, 'category');
    }
}
