<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroSection extends Model
{
    use HasFactory;
    protected $fillable = [
        'small_title', 'big_title', 'link1_text', 'link1_url', 'link2_text', 'link2_url',
        'service1_title', 'service1_image', 'service2_title', 'service2_image', 'service3_title', 'service3_image', 'background_image',
    ];
}
