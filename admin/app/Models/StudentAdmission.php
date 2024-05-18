<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAdmission extends Model
{
    use HasFactory;
    protected $fillable = [
        'photo',
        'student_id',
        'form_number',
        'name_bn',
        'name_en',
        'birth_certificate_number',
        'birth_place_district',
        'date_of_birth',
        'gender',
        'nationality',
        'religion',
        'blood_group',
        'class_role',
        'minorities',
        'minority_name',
        'handicap',
        'mother_nid',
        'mother_dob',
        'mother_name_bn',
        'mother_name_en',
        'mother_mobile',
        'mother_occupation',
        'mother_dead',
        'father_nid',
        'father_dob',
        'father_name_bn',
        'school_class_id',
        'branch_id',
        'father_name_en',
        'father_mobile',
        'father_occupation',
        'father_dead',
        'present_address_division',
        'present_address_district',
        'present_address_upazila',
        'present_address_city',
        'present_address_ward',
        'present_address_village',
        'present_address_house_number',
        'present_address_post',
        'present_address_post_code',
        'permanent_address_division',
        'permanent_address_district',
        'permanent_address_upazila',
        'permanent_address_city',
        'permanent_address_ward',
        'permanent_address_village',
        'permanent_address_house_number',
        'permanent_address_post',
        'permanent_address_post_code',
        'guardian_nid',
        'guardian_dob',
        'guardian_name_bn',
        'guardian_name_en',
        'guardian_mobile',
        'guardian_relationship',
        'information_correct',
        'school_class_id',
        'branch_id',
    ];

    public function schoolClass()
    {
        return $this->belongsTo(SchoolClass::class, 'school_class_id');
    }

    // Define the relationship with Branch model
    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }

    public function studentAttendances()
    {
        return $this->hasMany(StudentAttendance::class);
    }
}
