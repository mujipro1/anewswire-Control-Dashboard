<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'link',
        'description',
        'pub_date',
        'content',
        'categories',
        'guid',
        'type',
        'image_link',
    ];

    protected $casts = [
        'categories' => 'array', // Convert JSON to array automatically
    ];
}
