<?php

namespace App\Livewire\Admin\Teacher;

use Livewire\Component;
use App\Models\Teacher;
use App\Models\EducationalQualification;
use App\Models\TrainingInformation;
use Livewire\WithFileUploads;

class EditComponent extends Component
{
    use WithFileUploads;

    public $teacher;
    public $name_bn;
    public $name_en;
    public $gender;
    public $dob;
    public $mobile_number;
    public $email;
    public $designation;
    public $first_joining;
    public $job_status;
    public $pin_number;
    public $nationality;
    public $religion;
    public $blood_group;
    public $signature;
    public $present_address;
    public $permanent_address;
    public $subjects_of_teaching;
    public $educations = [];
    public $trainings = [];

    protected $rules = [
        'name_bn' => 'required|string',
        'name_en' => 'required|string',
        'gender' => 'required|in:Male,Female,Other',
        'dob' => 'required|date',
        'mobile_number' => 'required|string',
        'email' => 'nullable|email',
        'designation' => 'required|string',
        'first_joining' => 'required|date',
        'job_status' => 'nullable|string',
        'pin_number' => 'required|string',
        'nationality' => 'nullable|string',
        'religion' => 'nullable|string',
        'blood_group' => 'nullable|string',
        'signature' => 'nullable|image|max:1024', // Example validation for image upload
        'present_address' => 'required|array',
        'present_address.division' => 'required|string',
        'present_address.district' => 'required|string',
        'present_address.upazila' => 'required|string',
        'permanent_address' => 'required|array',
        'permanent_address.division' => 'required|string',
        'permanent_address.district' => 'required|string',
        'permanent_address.upazila' => 'required|string',
        'subjects_of_teaching' => 'required|array',
        'educations.*.degree' => 'required|string',
        'educations.*.subject' => 'required|string',
        'educations.*.board' => 'required|string',
        'educations.*.passing_year' => 'required|integer',
        'educations.*.grade' => 'nullable|string',
        'trainings.*.training_details' => 'required|string',
        'trainings.*.start_date' => 'required|date',
        'trainings.*.end_date' => 'required|date',
    ];

    public function mount($teacher)
    {
        $this->teacher = Teacher::findOrFail($teacher);

        // Initialize properties from $this->teacher
        $this->name_bn = $this->teacher->name_bn;
        $this->name_en = $this->teacher->name_en;
        $this->gender = $this->teacher->gender;
        $this->dob = $this->teacher->dob;
        $this->mobile_number = $this->teacher->mobile_number;
        $this->email = $this->teacher->email;
        $this->designation = $this->teacher->designation;
        $this->first_joining = $this->teacher->first_joining;
        $this->job_status = $this->teacher->job_status;
        $this->pin_number = $this->teacher->pin_number;
        $this->nationality = $this->teacher->nationality;
        $this->religion = $this->teacher->religion;
        $this->blood_group = $this->teacher->blood_group;
        $this->signature = $this->teacher->signature;
        $this->present_address = json_decode($this->teacher->present_address, true);
        $this->permanent_address = json_decode($this->teacher->permanent_address, true);
        $this->subjects_of_teaching = json_decode($this->teacher->subjects_of_teaching, true);
        $this->educations = json_decode($this->teacher->educations, true) ?? [];
        $this->trainings = json_decode($this->teacher->trainings, true) ?? [];
    }

    public function updateTeacher()
    {
        $validatedData = $this->validate();

        if ($this->signature) {
            $signaturePath = $this->signature->store('signatures', 'public');
            $this->teacher->signature = $signaturePath;
        }

        // Update teacher data
        $this->teacher->update([
            'name_bn' => $this->name_bn,
            'name_en' => $this->name_en,
            'gender' => $this->gender,
            'dob' => $this->dob,
            'mobile_number' => $this->mobile_number,
            'email' => $this->email,
            'designation' => $this->designation,
            'first_joining' => $this->first_joining,
            'job_status' => $this->job_status,
            'pin_number' => $this->pin_number,
            'nationality' => $this->nationality,
            'religion' => $this->religion,
            'blood_group' => $this->blood_group,
            'signature' => $this->signature,
            'present_address' => json_encode($this->present_address),
            'permanent_address' => json_encode($this->permanent_address),
            'subjects_of_teaching' => json_encode($this->subjects_of_teaching),
            'educations' => json_encode($this->educations),
            'trainings' => json_encode($this->trainings),
        ]);

        flash()->success('Teacher updated successfully.!');

        return redirect()->route('teachers.index');
    }

    public function render()
    {
        return view('livewire.admin.teacher.edit-component');
    }


}
