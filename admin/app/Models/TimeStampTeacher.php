<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeStampTeacher extends Model
{
    use HasFactory;
    protected $fillable = ['teacher_id', 'clock_in', 'clock_out'];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
