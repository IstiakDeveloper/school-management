<?php

namespace App\Livewire\Admin\Website;

use App\Models\SmarterLearnerSection;
use Livewire\Component;
use Livewire\WithFileUploads;

class SmarterLearnerSectionComponent extends Component
{
    use WithFileUploads;

    public $main_title;
    public $description;
    public $background_image;
    public $background_image_path;
    public $video_url;
    public $item1_title;
    public $item1_number;
    public $item2_title;
    public $item2_number;
    public $item3_title;
    public $item3_number;
    public $item4_title;
    public $item4_number;

    protected $rules = [
        'main_title' => 'required|string|max:255',
        'description' => 'required|string|max:1000',
        'video_url' => 'required|url',
        'item1_title' => 'required|string|max:255',
        'item1_number' => 'required|integer',
        'item2_title' => 'required|string|max:255',
        'item2_number' => 'required|integer',
        'item3_title' => 'required|string|max:255',
        'item3_number' => 'required|integer',
        'item4_title' => 'required|string|max:255',
        'item4_number' => 'required|integer',
        'background_image' => 'nullable|image|max:1024',
    ];

    public function mount()
    {
        $section = SmarterLearnerSection::first();
        if ($section) {
            $this->main_title = $section->main_title;
            $this->description = $section->description;
            $this->background_image_path = $section->background_image;
            $this->video_url = $section->video_url;
            $this->item1_title = $section->item1_title;
            $this->item1_number = $section->item1_number;
            $this->item2_title = $section->item2_title;
            $this->item2_number = $section->item2_number;
            $this->item3_title = $section->item3_title;
            $this->item3_number = $section->item3_number;
            $this->item4_title = $section->item4_title;
            $this->item4_number = $section->item4_number;
        }
    }

    public function storeSection()
    {
        $this->validate();

        if ($this->background_image) {
            $this->background_image_path = $this->background_image->store('backgrounds', 'public');
        }

        $section = SmarterLearnerSection::first();
        if ($section) {
            $section->update([
                'main_title' => $this->main_title,
                'description' => $this->description,
                'background_image' => $this->background_image_path,
                'video_url' => $this->video_url,
                'item1_title' => $this->item1_title,
                'item1_number' => $this->item1_number,
                'item2_title' => $this->item2_title,
                'item2_number' => $this->item2_number,
                'item3_title' => $this->item3_title,
                'item3_number' => $this->item3_number,
                'item4_title' => $this->item4_title,
                'item4_number' => $this->item4_number,
            ]);
        } else {
            SmarterLearnerSection::create([
                'main_title' => $this->main_title,
                'description' => $this->description,
                'background_image' => $this->background_image_path,
                'video_url' => $this->video_url,
                'item1_title' => $this->item1_title,
                'item1_number' => $this->item1_number,
                'item2_title' => $this->item2_title,
                'item2_number' => $this->item2_number,
                'item3_title' => $this->item3_title,
                'item3_number' => $this->item3_number,
                'item4_title' => $this->item4_title,
                'item4_number' => $this->item4_number,
            ]);
        }

        flash()->success('Smarter Learner Section updated successfully.');
    }

    public function render()
    {
        return view('livewire.admin.website.smarter-learner-section-component');
    }
}
