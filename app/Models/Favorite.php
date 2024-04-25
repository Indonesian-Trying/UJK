<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Favorite extends Model
{
    use SoftDeletes, HasFactory;
    protected $fillable = [
        'title',
        'writer',
        'publishes',
        'year',
        'synop',
        'category',
    ];
}
