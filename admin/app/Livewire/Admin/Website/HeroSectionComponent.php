<?php

namespace App\Livewire\Admin\Website;

use App\Models\HeroSection;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class HeroSectionComponent extends Component
{
    use WithFileUploads;

    public $small_title;
    public $big_title;
    public $link1_text;
    public $link1_url;
    public $link2_text;
    public $link2_url;
    public $service1_title;
    public $service1_image;
    public $service1_image_path;
    public $service2_title;
    public $service2_image;
    public $service2_image_path;
    public $service3_title;
    public $service3_image;
    public $service3_image_path;
    public $background_image;
    public $background_image_path;
    public $heroSectionId;

    public function mount()
    {
        $heroSection = HeroSection::first();

        if ($heroSection) {
            $this->heroSectionId = $heroSection->id;
            $this->small_title = $heroSection->small_title;
            $this->big_title = $heroSection->big_title;
            $this->link1_text = $heroSection->link1_text;
            $this->link1_url = $heroSection->link1_url;
            $this->link2_text = $heroSection->link2_text;
            $this->link2_url = $heroSection->link2_url;
            $this->service1_title = $heroSection->service1_title;
            $this->service1_image_path = $heroSection->service1_image;
            $this->service2_title = $heroSection->service2_title;
            $this->service2_image_path = $heroSection->service2_image;
            $this->service3_title = $heroSection->service3_title;
            $this->service3_image_path = $heroSection->service3_image;
            $this->background_image_path = $heroSection->background_image;
        }
    }

    public function render()
    {
        return view('livewire.admin.website.hero-section-component');
    }

    public function create()
    {
        $this->reset([
            'small_title',
            'big_title',
            'link1_text',
            'link1_url',
            'link2_text',
            'link2_url',
            'service1_title',
            'service1_image',
            'service1_image_path',
            'service2_title',
            'service2_image',
            'service2_image_path',
            'service3_title',
            'service3_image',
            'service3_image_path',
            'background_image',
            'background_image_path',
            'heroSectionId'
        ]);
    }

    public function storeHeroSection()
    {
        $validatedData = $this->validate([
            'small_title' => 'required|string|max:255',
            'big_title' => 'required|string|max:255',
            'link1_text' => 'required|string|max:255',
            'link1_url' => 'required|url',
            'link2_text' => 'required|string|max:255',
            'link2_url' => 'required|url',
            'service1_title' => 'required|string|max:255',
            'service1_image' => 'nullable|image|max:1024',
            'service2_title' => 'required|string|max:255',
            'service2_image' => 'nullable|image|max:1024',
            'service3_title' => 'required|string|max:255',
            'service3_image' => 'nullable|image|max:1024',
            'background_image' => 'nullable|image|max:2048',
        ]);

        if ($this->heroSectionId) {
            $heroSection = HeroSection::findOrFail($this->heroSectionId);
        } else {
            $heroSection = new HeroSection();
        }

        $heroSection->fill($validatedData);

        if ($this->service1_image) {
            if ($heroSection->service1_image) {
                Storage::disk('public')->delete($heroSection->service1_image);
            }
            $heroSection->service1_image = $this->service1_image->store('services', 'public');
        } elseif (isset($this->service1_image_path)) {
            $heroSection->service1_image = $this->service1_image_path;
        }

        if ($this->service2_image) {
            if ($heroSection->service2_image) {
                Storage::disk('public')->delete($heroSection->service2_image);
            }
            $heroSection->service2_image = $this->service2_image->store('services', 'public');
        } elseif (isset($this->service2_image_path)) {
            $heroSection->service2_image = $this->service2_image_path;
        }

        if ($this->service3_image) {
            if ($heroSection->service3_image) {
                Storage::disk('public')->delete($heroSection->service3_image);
            }
            $heroSection->service3_image = $this->service3_image->store('services', 'public');
        } elseif (isset($this->service3_image_path)) {
            $heroSection->service3_image = $this->service3_image_path;
        }

        if ($this->background_image) {
            if ($heroSection->background_image) {
                Storage::disk('public')->delete($heroSection->background_image);
            }
            $heroSection->background_image = $this->background_image->store('backgrounds', 'public');
        } elseif (isset($this->background_image_path)) {
            $heroSection->background_image = $this->background_image_path;
        }

        $heroSection->save();

        flash()->success('Hero section updated successfully.');
        return redirect()->route('admin.hero-section');
    }

}
