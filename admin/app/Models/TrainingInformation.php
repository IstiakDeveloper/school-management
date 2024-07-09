<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingInformation extends Model
{
    use HasFactory;
    protected $fillable = [
        'teacher_id',
        'training_details',
        'training_start_date',
        'training_end_date',
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
