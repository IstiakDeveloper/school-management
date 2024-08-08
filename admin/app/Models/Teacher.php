<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_bn',
        'name_en',
        'gender',
        'dob',
        'mobile_number',
        'email',
        'designation',
        'first_joining',
        'job_status',
        'pin_number',
        'nationality',
        'religion',
        'blood_group',
        'signature',
        'photo',
        'present_division',
        'present_district',
        'present_upazila',
        'present_union',
        'present_post_office',
        'present_postal_code',
        'present_address',
        'permanent_division',
        'permanent_district',
        'permanent_upazila',
        'permanent_union',
        'permanent_post_office',
        'permanent_postal_code',
        'permanent_address',
        'subjects_of_teaching',
    ];

    public function educationalQualifications()
    {
        return $this->hasMany(EducationalQualification::class);
    }

    public function trainingInformation()
    {
        return $this->hasMany(TrainingInformation::class);
    }

    public function trainings()
    {
        return $this->hasMany(TrainingInformation::class);
    }

    public function educations()
    {
        return $this->hasMany(EducationalQualification::class);
    }
    public function teacherAttendance()
    {
        return $this->hasMany(TeacherAttendance::class);
    }

}
