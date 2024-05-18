<?php

namespace App\Livewire\Admin\Student;

use App\Models\Branch;
use App\Models\SchoolClass;
use App\Models\StudentAdmission;
use Livewire\Component;
use Livewire\WithFileUploads;

class StudentAdmissionEdit extends Component
{
    use WithFileUploads;

    public $studentAdmission;
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

    public function mount(StudentAdmission $studentAdmission)
    {
        $this->studentAdmission = $studentAdmission;
        $this->photo = $studentAdmission->photo;
        $this->student_id = $studentAdmission->student_id;
        $this->form_number = $studentAdmission->form_number;
        $this->name_bn = $studentAdmission->name_bn;
        $this->name_en = $studentAdmission->name_en;
        $this->birth_certificate_number = $studentAdmission->birth_certificate_number;
        $this->birth_place_district = $studentAdmission->birth_place_district;
        $this->date_of_birth = $studentAdmission->date_of_birth;
        $this->gender = $studentAdmission->gender;
        $this->nationality = $studentAdmission->nationality;
        $this->religion = $studentAdmission->religion;
        $this->blood_group = $studentAdmission->blood_group;
        $this->class_role = $studentAdmission->class_role;
        $this->minorities = $studentAdmission->minorities;
        $this->minority_name = $studentAdmission->minority_name;
        $this->handicap = $studentAdmission->handicap;
        $this->mother_nid = $studentAdmission->mother_nid;
        $this->mother_dob = $studentAdmission->mother_dob;
        $this->mother_name_bn = $studentAdmission->mother_name_bn;
        $this->mother_name_en = $studentAdmission->mother_name_en;
        $this->mother_mobile = $studentAdmission->mother_mobile;
        $this->mother_occupation = $studentAdmission->mother_occupation;
        $this->father_nid = $studentAdmission->father_nid;
        $this->father_dob = $studentAdmission->father_dob;
        $this->father_name_bn = $studentAdmission->father_name_bn;
        $this->father_name_en = $studentAdmission->father_name_en;
        $this->father_mobile = $studentAdmission->father_mobile;
        $this->father_occupation = $studentAdmission->father_occupation;
        $this->father_dead = $studentAdmission->father_dead;
        $this->present_address_division = $studentAdmission->present_address_division;
        $this->present_address_district = $studentAdmission->present_address_district;
        $this->present_address_upazila = $studentAdmission->present_address_upazila;
        $this->present_address_city = $studentAdmission->present_address_city;
        $this->present_address_ward = $studentAdmission->present_address_ward;
        $this->present_address_village = $studentAdmission->present_address_village;
        $this->present_address_house_number = $studentAdmission->present_address_house_number;
        $this->present_address_post = $studentAdmission->present_address_post;
        $this->present_address_post_code = $studentAdmission->present_address_post_code;
        $this->permanent_address_division = $studentAdmission->permanent_address_division;
        $this->permanent_address_district = $studentAdmission->permanent_address_district;
        $this->permanent_address_upazila = $studentAdmission->permanent_address_upazila;
        $this->permanent_address_city = $studentAdmission->permanent_address_city;
        $this->permanent_address_ward = $studentAdmission->permanent_address_ward;
        $this->permanent_address_village = $studentAdmission->permanent_address_village;
        $this->permanent_address_house_number = $studentAdmission->permanent_address_house_number;
        $this->permanent_address_post = $studentAdmission->permanent_address_post;
        $this->permanent_address_post_code = $studentAdmission->permanent_address_post_code;
        $this->guardian_nid = $studentAdmission->guardian_nid;
        $this->guardian_dob = $studentAdmission->guardian_dob;
        $this->guardian_name_bn = $studentAdmission->guardian_name_bn;
        $this->guardian_name_en = $studentAdmission->guardian_name_en;
        $this->guardian_mobile = $studentAdmission->guardian_mobile;
        $this->guardian_relationship = $studentAdmission->guardian_relationship;
        $this->information_correct = $studentAdmission->information_correct;
        $this->school_class_id = $studentAdmission->school_class_id;
        $this->branch_id = $studentAdmission->branch_id;
    }

    public function render()
    {
        $classes = SchoolClass::all();
        $branches = Branch::all();
        return view('livewire.admin.student.student-admission-edit', compact('classes', 'branches'));
    }

    public function submit()
    {
        $validatedData = $this->validate([
            'photo' => 'nullable|image|max:2048',
            'student_id' => 'required|string|unique:student_admissions,student_id,' . $this->studentAdmission->id,
            'form_number' => 'required|string|unique:student_admissions,form_number,' . $this->studentAdmission->id,
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
            'minority_name' => $this->minorities ? 'nullable|string' : '',
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
        } else {
            unset($validatedData['photo']);
        }

        $this->studentAdmission->update($validatedData);

        flash()->success('Student admission updated successfully.');
    }


    public function toggleMinorityNameVisibility($value)
    {
        $this->showMinorityName = $value;
    }
}
