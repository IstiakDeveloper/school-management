<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogSection extends Model
{
    use HasFactory;
    protected $fillable = [
        'main_title',
        'description',
        'background_image',
    ];
}
