<?php

namespace App\Livewire\Admin\Teacher;

use Livewire\Component;
use App\Models\Teacher;
use App\Models\EducationalQualification;
use App\Models\TrainingInformation;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class CreateComponent extends Component
{

    use WithFileUploads;
    
    public $photo;
    public $name_bn, $name_en, $gender, $dob, $mobile_number, $email, $designation, $first_joining, $job_status, $pin_number, $religion, $blood_group, $signature;
    public $present_division, $present_district, $present_upazila, $present_union, $present_post_office, $present_postal_code, $present_address;
    public $permanent_division, $permanent_district, $permanent_upazila, $permanent_union, $permanent_post_office, $permanent_postal_code, $permanent_address;
    public $subjects_of_teaching = [];
    public $educational_qualifications = [];
    public $training_information = [];
    public $same_address = false;
    public $locations;
    public $nationality = 'Bangladesh';
    public $customNationality = '';

    public function mount()
    {
        $this->locations = json_decode(Storage::get('locations.json'), true);

        $this->present_division = $this->locations['divisions'][null] ?? '';
        if (isset($this->locations['districts'][$this->present_division])) {
            $this->present_district = $this->locations['districts'][$this->present_division][null] ?? '';
            if (isset($this->locations['upazilas'][$this->present_district])) {
                $this->present_upazila = $this->locations['upazilas'][$this->present_district][null] ?? '';
            }
        }
    }

    public function addEducationalQualification()
    {
        $this->educational_qualifications[] = ['degree' => '', 'subject' => '', 'board' => '', 'passing_year' => '', 'grade' => ''];
    }

    public function removeEducationalQualification($index)
    {
        unset($this->educational_qualifications[$index]);
        $this->educational_qualifications = array_values($this->educational_qualifications);
    }

    public function addTrainingInformation()
    {
        $this->training_information[] = ['training_details' => '', 'training_start_date' => '', 'training_end_date' => ''];
    }

    public function removeTrainingInformation($index)
    {
        unset($this->training_information[$index]);
        $this->training_information = array_values($this->training_information);
    }


    public function updatedSameAddress($value)
    {
        if ($value) {
            $this->permanent_division = $this->present_division;
            $this->permanent_district = $this->present_district;
            $this->permanent_upazila = $this->present_upazila;
            $this->permanent_union = $this->present_union;
            $this->permanent_post_office = $this->present_post_office;
            $this->permanent_postal_code = $this->present_postal_code;
            $this->permanent_address = $this->present_address;
        }
    }

    public function updatedPresentDivision($value)
    {
        if (isset($this->locations['districts'][$value])) {
            $this->present_district = $this->locations['districts'][$value][0] ?? '';
            if (isset($this->locations['upazilas'][$this->present_district])) {
                $this->present_upazila = $this->locations['upazilas'][$this->present_district][0] ?? '';
            }
        }
    }

    public function store()
    {
        $this->validate([
            'photo' => 'nullable|image|max:1024',
            'signature' => 'nullable|image|max:1024',
            'name_bn' => 'required|string',
            'name_en' => 'required|string',
            'gender' => 'required|string',
            'dob' => 'required|date',
            'mobile_number' => 'required|string',
            'email' => 'nullable|email',
            'designation' => 'required|string',
            'first_joining' => 'required|date',
            'job_status' => 'required|string',
            'pin_number' => 'required|string',
            'nationality' => 'required|string',
            'religion' => 'required|string',
            'blood_group' => 'required|string',
            'present_division' => 'required|string',
            'present_district' => 'required|string',
            'present_upazila' => 'required|string',
            'present_union' => 'nullable|string',
            'present_post_office' => 'required|string',
            'present_postal_code' => 'nullable|string',
            'present_address' => 'required|string',
            'permanent_division' => 'required|string',
            'permanent_district' => 'required|string',
            'permanent_upazila' => 'required|string',
            'permanent_union' => 'nullable|string',
            'permanent_post_office' => 'required|string',
            'permanent_postal_code' => 'nullable|string',
            'permanent_address' => 'required|string',
            'subjects_of_teaching' => 'nullable|array',
            'educational_qualifications.*.degree' => 'required|string',
            'educational_qualifications.*.subject' => 'required|string',
            'educational_qualifications.*.board' => 'required|string',
            'educational_qualifications.*.passing_year' => 'required|date_format:Y',
            'educational_qualifications.*.grade' => 'required|string',
            'training_information.*.training_details' => 'required|string',
            'training_information.*.training_start_date' => 'required|date',
            'training_information.*.training_end_date' => 'required|date',
        ]);

        $photoPath = $this->photo ? $this->photo->store('photos', 'public') : null;
        $signaturePath = $this->signature ? $this->signature->store('signatures', 'public') : null;

        $teacher = Teacher::create([
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
            'nationality' => $this->nationality === 'Others' ? $this->customNationality : $this->nationality,
            'religion' => $this->religion,
            'blood_group' => $this->blood_group,
            'signature' => $signaturePath,
            'photo' => $photoPath,
            'present_division' => $this->present_division,
            'present_district' => $this->present_district,
            'present_upazila' => $this->present_upazila,
            'present_union' => $this->present_union,
            'present_post_office' => $this->present_post_office,
            'present_postal_code' => $this->present_postal_code,
            'present_address' => $this->present_address,
            'permanent_division' => $this->permanent_division,
            'permanent_district' => $this->permanent_district,
            'permanent_upazila' => $this->permanent_upazila,
            'permanent_union' => $this->permanent_union,
            'permanent_post_office' => $this->permanent_post_office,
            'permanent_postal_code' => $this->permanent_postal_code,
            'permanent_address' => $this->permanent_address,
            'subjects_of_teaching' => json_encode($this->subjects_of_teaching),
        ]);

        foreach ($this->educational_qualifications as $qualification) {
            EducationalQualification::create([
                'teacher_id' => $teacher->id,
                'degree' => $qualification['degree'],
                'subject' => $qualification['subject'],
                'board' => $qualification['board'],
                'passing_year' => $qualification['passing_year'],
                'grade' => $qualification['grade'],
            ]);
        }

        foreach ($this->training_information as $training) {
            TrainingInformation::create([
                'teacher_id' => $teacher->id,
                'training_details' => $training['training_details'],
                'training_start_date' => $training['training_start_date'],
                'training_end_date' => $training['training_end_date'],
            ]);
        }

        flash()->success('Teacher created successfully.!');
        return redirect()->route('teachers.index');
    }

    public function updatedNationality($value)
    {
        if ($value !== 'Others') {
            $this->customNationality = '';
        }
    }
    
    public function render()
    {
        return view('livewire.admin.teacher.create-component');
    }

}
