<?php

namespace App\Livewire\Admin\Student;

use App\Models\Branch;
use App\Models\SchoolClass;
use App\Models\StudentAdmission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\Permission\Models\Role;

class StudentAdmissionCreate extends Component
{
    use WithFileUploads;

    public $photo;
    public $student_id;
    public $form_number;
    public $name_bn;
    public $name_en;
    public $birth_certificate_number;
    public $birth_place_district;
    public $date_of_birth;
    public $gender;
    public $nationality;
    public $religion;
    public $blood_group;
    public $class_role;
    public $minorities;
    public $minority_name;
    public $handicap;
    public $mother_nid;
    public $mother_dob;
    public $mother_name_bn;
    public $mother_name_en;
    public $mother_mobile;
    public $mother_occupation;
    public $father_nid;
    public $father_dob;
    public $father_name_bn;
    public $father_name_en;
    public $father_mobile;
    public $father_occupation;
    public $father_dead;
    public $present_address_division;
    public $present_address_district;
    public $present_address_upazila;
    public $present_address_city;
    public $present_address_ward;
    public $present_address_village;
    public $present_address_house_number;
    public $present_address_post;
    public $present_address_post_code;
    public $permanent_address_division;
    public $permanent_address_district;
    public $permanent_address_upazila;
    public $permanent_address_city;
    public $permanent_address_ward;
    public $permanent_address_village;
    public $permanent_address_house_number;
    public $permanent_address_post;
    public $permanent_address_post_code;
    public $guardian_nid;
    public $guardian_dob;
    public $guardian_name_bn;
    public $guardian_name_en;
    public $guardian_mobile;
    public $guardian_relationship;
    public $information_correct;
    public $school_class_id;
    public $branch_id;
    public $showMinorityName = false;


    public function render()
    {
        $classes = SchoolClass::all();
        $branches = Branch::all();
        return view('livewire.admin.student.student-admission-create', compact('classes', 'branches'));
    }

    public function submit(Request $request)
    {
        $validatedData = $this->validate([
            'photo' => 'nullable|image|max:2048',
            'student_id' => 'required|string|unique:student_admissions',
            'form_number' => 'required|string|unique:student_admissions',
            'name_bn' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'birth_certificate_number' => 'required|string',
            'birth_place_district' => 'required|string',
            'date_of_birth' => 'required|date',
            'gender' => 'required|string',
            'nationality' => 'required|string',
            'religion' => 'required|string',
            'blood_group' => 'required|string',
            'class_role' => 'required|string',
            'minorities' => 'boolean',
            'minority_name' => 'nullable|string',
            'handicap' => 'nullable|string',
            'mother_nid' => 'nullable|string',
            'mother_dob' => 'nullable|date',
            'mother_name_bn' => 'nullable|string|max:255',
            'mother_name_en' => 'nullable|string|max:255',
            'mother_mobile' => 'nullable|string',
            'mother_occupation' => 'nullable|string',
            'father_nid' => 'nullable|string',
            'father_dob' => 'nullable|date',
            'father_name_bn' => 'nullable|string|max:255',
            'father_name_en' => 'nullable|string|max:255',
            'father_mobile' => 'nullable|string',
            'father_occupation' => 'nullable|string',
            'father_dead' => 'boolean',
            'present_address_division' => 'nullable|string',
            'present_address_district' => 'nullable|string',
            'present_address_upazila' => 'nullable|string',
            'present_address_city' => 'nullable|string',
            'present_address_ward' => 'nullable|string',
            'present_address_village' => 'nullable|string',
            'present_address_house_number' => 'nullable|string',
            'present_address_post' => 'nullable|string',
            'present_address_post_code' => 'nullable|string',
            'permanent_address_division' => 'nullable|string',
            'permanent_address_district' => 'nullable|string',
            'permanent_address_upazila' => 'nullable|string',
            'permanent_address_city' => 'nullable|string',
            'permanent_address_ward' => 'nullable|string',
            'permanent_address_village' => 'nullable|string',
            'permanent_address_house_number' => 'nullable|string',
            'permanent_address_post' => 'nullable|string',
            'permanent_address_post_code' => 'nullable|string',
            'guardian_nid' => 'nullable|string',
            'guardian_dob' => 'nullable|date',
            'guardian_name_bn' => 'nullable|string|max:255',
            'guardian_name_en' => 'nullable|string|max:255',
            'guardian_mobile' => 'nullable|string',
            'guardian_relationship' => 'nullable|string',
            'information_correct' => 'boolean',
            'school_class_id' => 'required|exists:school_classes,id',
            'branch_id' => 'required|exists:branches,id',
        ]);

        if ($this->photo) {
            $validatedData['photo'] = $this->photo->store('photos', 'public');
        }

        StudentAdmission::create($validatedData);

        $user = User::create([
            'name' => $this->name_en,
            'email' => $this->mother_mobile,
            'password' => Hash::make('studentpassword'),
        ]);

        $studentRole = Role::where('name', 'Student')->firstOrCreate(['name' => 'Student']);
        $user->assignRole($studentRole);

        $this->reset();
        flash()->success('Student admission created successfully.');
        return Redirect::route('admissions');

    }

    public function toggleMinorityNameVisibility($value)
    {
        $this->showMinorityName = $value;
    }

}
