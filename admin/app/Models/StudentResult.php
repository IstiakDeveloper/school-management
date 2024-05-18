<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentResult extends Model
{
    use HasFactory;
    protected $fillable = [
        'exam_year',
        'semester',
        'student_admission_id',
        'school_class_id',
        'subject_id',
        'exam_type',
        'marks',
    ];

    public function student()
    {
        return $this->belongsTo(StudentAdmission::class, 'student_admission_id');
    }

    public function schoolClass()
    {
        return $this->belongsTo(SchoolClass::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
