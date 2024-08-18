<?php

namespace App\Livewire\Admin\Student;

use App\Models\Branch;
use App\Models\SchoolClass;
use App\Models\StudentAdmission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\Permission\Models\Role;

class StudentAdmissionEdit extends Component
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
    public $mother_dead;
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
    public $studentAdmission;

    public $divisions = [];
    public $districts = [];
    public $upazilas = [];

    public $selectedDivision;
    public $selectedDistrict;
    public $selectedUpazila;
    public $same_as_present = false;

    public function mount($id) {
        $this->studentAdmission = StudentAdmission::findOrFail($id);
    
        // Initialize properties with existing data
        $this->fill($this->studentAdmission->toArray());
    
        $locations = json_decode(Storage::disk('local')->get('locations.json'), true);
    
        // Set divisions, districts, and upazilas
        $this->divisions = $locations['divisions'];
        $this->selectedDivision = $this->present_address_division;
        $this->districts = $locations['districts'][$this->selectedDivision] ?? [];
        $this->selectedDistrict = $this->present_address_district;
        $this->upazilas = $locations['upazilas'][$this->selectedDistrict] ?? [];
        $this->selectedUpazila = $this->present_address_upazila;
    }
    

    public function updatedSameAsPresent($value)
    {
        if ($value) {
            $this->permanent_address_division = $this->present_address_division;
            $this->permanent_address_district = $this->present_address_district;
            $this->permanent_address_upazila = $this->present_address_upazila;
            $this->permanent_address_city = $this->present_address_city;
            $this->permanent_address_ward = $this->present_address_ward;
            $this->permanent_address_village = $this->present_address_village;
            $this->permanent_address_house_number = $this->present_address_house_number;
            $this->permanent_address_post = $this->present_address_post;
            $this->permanent_address_post_code = $this->present_address_post_code;
        } else {
            $this->permanent_address_division = '';
            $this->permanent_address_district = '';
            $this->permanent_address_upazila = '';
            $this->permanent_address_city = '';
            $this->permanent_address_ward = '';
            $this->permanent_address_village = '';
            $this->permanent_address_house_number = '';
            $this->permanent_address_post = '';
            $this->permanent_address_post_code = '';
        }
    }

    public function updatedSelectedDivision($value)
    {
        $locations = json_decode(Storage::disk('local')->get('locations.json'), true);
        $this->districts = $locations['districts'][$value] ?? [];
        $this->selectedDistrict = null; // Reset district
        $this->selectedUpazila = null;  // Reset upazila
    }
    
    public function updatedSelectedDistrict($value)
    {
        $locations = json_decode(Storage::disk('local')->get('locations.json'), true);
        $this->upazilas = $locations['upazilas'][$value] ?? [];
        $this->selectedUpazila = null; // Reset upazila
    }
    

    public function updatedSelectedUpazila($value)
    {
        $this->present_address_upazila = $value;
    }

    public function render()
    {
        $classes = SchoolClass::all();
        $branches = Branch::all();
        return view('livewire.admin.student.student-admission-edit', compact('classes', 'branches'));
    }

    public function submit(Request $request)
    {
        $validatedData = $this->validate([
            'photo' => 'nullable',
            'student_id' => 'required|string|unique:student_admissions,student_id,' . $this->studentAdmission->id,
            'form_number' => 'required|string|unique:student_admissions,form_number,' . $this->studentAdmission->id,
            'name_bn' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'birth_certificate_number' => 'required|string',
            'birth_place_district' => 'nullable|string',
            'date_of_birth' => 'required|date',
            'gender' => 'required|string',
            'nationality' => 'required|string',
            'religion' => 'required|string',
            'blood_group' => 'nullable|string',
            'class_role' => 'required|string',
            'minorities' => 'boolean',
            'minority_name' => 'nullable|string',
            'handicap' => 'nullable|string',
            'mother_nid' => 'nullable|string',
            'mother_dob' => 'nullable|date',
            'mother_name_bn' => 'nullable|string|max:255',
            'mother_name_en' => 'nullable|string|max:255',
            'mother_mobile' => 'required|string',
            'mother_occupation' => 'nullable|string',
            'mother_dead' => 'required|boolean',
            'father_nid' => 'nullable|string',
            'father_dob' => 'nullable|date',
            'father_name_bn' => 'nullable|string|max:255',
            'father_name_en' => 'nullable|string|max:255',
            'father_mobile' => 'nullable|string',
            'father_occupation' => 'nullable|string',
            'father_dead' => 'required|boolean',
            'present_address_division' => 'required|string',
            'present_address_district' => 'required|string',
            'present_address_upazila' => 'required|string',
            'present_address_city' => 'required|string',
            'present_address_ward' => 'required|string',
            'present_address_village' => 'nullable|string',
            'present_address_house_number' => 'nullable|string',
            'present_address_post' => 'nullable|string',
            'present_address_post_code' => 'required|string',
            'permanent_address_division' => 'required|string',
            'permanent_address_district' => 'required|string',
            'permanent_address_upazila' => 'required|string',
            'permanent_address_city' => 'required|string',
            'permanent_address_ward' => 'required|string',
            'permanent_address_village' => 'nullable|string',
            'permanent_address_house_number' => 'nullable|string',
            'permanent_address_post' => 'nullable|string',
            'permanent_address_post_code' => 'required|string',
            'guardian_nid' => 'nullable|string',
            'guardian_dob' => 'nullable|date',
            'guardian_name_bn' => 'nullable|string|max:255',
            'guardian_name_en' => 'nullable|string|max:255',
            'guardian_mobile' => 'nullable|string',
            'guardian_relationship' => 'nullable|string',
            'information_correct' => 'required|boolean',
            'school_class_id' => 'required|exists:school_classes,id',
            'branch_id' => 'required|exists:branches,id',
        ]);

        if ($this->photo) {
            // If a new photo is uploaded, update it
            // $validatedData['photo'] = $this->photo->store('photos', 'public');
        } else {
            // Keep existing photo if not updated
            $validatedData['photo'] = $this->studentAdmission->photo;
        }

        // Update the student admission record
        $this->studentAdmission->update($validatedData);

        // Find and update the user associated with the admission
        $user = User::where('student_admission_id', $this->studentAdmission->id)->first();
        if ($user) {
            $user->update([
                'name' => $this->name_en,
                'email' => $this->mother_mobile,
                'password' => Hash::make('studentpassword'), // Update password if necessary
            ]);
        }

        // Reset the form and provide feedback
        $this->reset();
        flash()->success('Student admission updated successfully.');
        return Redirect::route('admissions');
    }

    public function toggleMinorityNameVisibility($value)
    {
        $this->showMinorityName = $value;
    }
}

