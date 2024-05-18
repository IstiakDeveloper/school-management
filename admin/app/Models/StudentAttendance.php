<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAttendance extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_admission_id', 'date', 'status',
    ];

    // Define the relationship with the StudentAdmission model
    public function studentAdmission()
    {
        return $this->belongsTo(StudentAdmission::class);
    }
}
