<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationalQualification extends Model
{
    use HasFactory;
    protected $fillable = [
        'teacher_id',
        'degree',
        'subject',
        'board',
        'passing_year',
        'grade',
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
