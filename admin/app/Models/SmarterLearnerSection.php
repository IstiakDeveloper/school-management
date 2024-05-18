<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmarterLearnerSection extends Model
{
    use HasFactory;
    protected $fillable = [
        'main_title',
        'description',
        'background_image',
        'video_url',
        'item1_title',
        'item1_number',
        'item2_title',
        'item2_number',
        'item3_title',
        'item3_number',
        'item4_title',
        'item4_number',
    ];
}
