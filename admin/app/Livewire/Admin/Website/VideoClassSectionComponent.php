<?php

namespace App\Livewire\Admin\Website;

use App\Models\VideoClass;
use App\Models\VideoClassesSection;
use Livewire\Component;
use Livewire\WithFileUploads;

class VideoClassSectionComponent extends Component
{
    use WithFileUploads;

    public $main_title;
    public $description;
    public $classes = [];
    public $video_class_title;
    public $video_class_subtitle;
    public $video_class_url;
    public $video_class_thumbnail;
    public $video_class_thumbnail_path;

    protected $rules = [
        'main_title' => 'required|string|max:255',
        'description' => 'required|string|max:1000',
        'video_class_title' => 'nullable|string|max:255',
        'video_class_subtitle' => 'nullable|string|max:255',
        'video_class_url' => 'nullable|url',
        'video_class_thumbnail' => 'nullable|image|max:1024',
    ];

    public function mount()
    {
        $section = VideoClassesSection::first();
        if ($section) {
            $this->main_title = $section->main_title;
            $this->description = $section->description;
        }

        $this->classes = VideoClass::all()->toArray();
    }

    public function storeSection()
    {
        $this->validateOnly('main_title');
        $this->validateOnly('description');

        $section = VideoClassesSection::first();
        if ($section) {
            $section->update([
                'main_title' => $this->main_title,
                'description' => $this->description,
            ]);
        } else {
            VideoClassesSection::create([
                'main_title' => $this->main_title,
                'description' => $this->description,
            ]);
        }

        flash()->success('Video Classes Section updated successfully.');
    }

    public function storeVideoClass()
    {
        $this->validate([
            'video_class_title' => 'required|string|max:255',
            'video_class_subtitle' => 'nullable|string|max:255',
            'video_class_url' => 'required|url',
            'video_class_thumbnail' => 'nullable|image|max:1024',
        ]);

        if ($this->video_class_thumbnail) {
            $this->video_class_thumbnail_path = $this->video_class_thumbnail->store('thumbnails', 'public');
        }

        $videoClass = VideoClass::create([
            'title' => $this->video_class_title,
            'subtitle' => $this->video_class_subtitle,
            'url' => $this->video_class_url,
            'thumbnail' => $this->video_class_thumbnail_path,
        ]);

        $this->classes[] = $videoClass->toArray();
        $this->resetVideoClassInputFields();

        flash()->success('Video Class added successfully.');
    }

    public function deleteVideoClass($id)
    {
        $videoClass = VideoClass::find($id);
        if ($videoClass) {
            $videoClass->delete();
            $this->classes = array_filter($this->classes, fn($class) => $class['id'] != $id);
            flash()->success('Video Class deleted successfully.');
        }
    }

    private function resetVideoClassInputFields()
    {
        $this->video_class_title = '';
        $this->video_class_subtitle = '';
        $this->video_class_url = '';
        $this->video_class_thumbnail = null;
        $this->video_class_thumbnail_path = '';
    }

    public function render()
    {
        return view('livewire.admin.website.video-class-section-component');
    }
}
