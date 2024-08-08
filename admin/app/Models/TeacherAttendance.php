<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherAttendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_id', 'date', 'clock_in', 'clock_out', 'absent',
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
