<?php

namespace App\Livewire\Admin\Website;

use App\Models\Logo;
use Livewire\Component;
use Livewire\WithFileUploads;

class Header extends Component
{
    use WithFileUploads;

    public $logo;
    public $logo_path;
    public $logo_text;
    public $logoId = null;

    protected $rules = [
        'logo' => 'nullable|image|max:1024',
        'logo_text' => 'required|string|max:255',
    ];

    public function mount()
    {
        $logo = Logo::first();
        if ($logo) {
            $this->logo_path = $logo->logo;
            $this->logoId = $logo->id;
            $this->logo_text = $logo->logo_text;
        }
    }

    public function storeLogo()
    {
        $this->validate();

        $logo = new Logo();
        $this->saveLogo($logo);

        session()->flash('message', 'Logo added successfully.');
    }



    private function saveLogo($logo)
    {
        if ($this->logo) {
            $logo->logo = $this->logo->store('logos', 'public');
        }
        $logo->logo_text = $this->logo_text;
        $logo->save();
    }

    public function updateLogo()
    {
        $this->validate();

        $logo = Logo::findOrFail($this->logoId);
        $this->saveLogo($logo);

        session()->flash('message', 'Logo updated successfully.');
    }

    public function deleteLogo()
    {
        $logo = Logo::findOrFail($this->logoId);
        $logo->delete();
        $this->resetInputFields();
        session()->flash('message', 'Logo deleted successfully.');
    }

    private function resetInputFields()
    {
        $this->logo = null;
        $this->logo_text = '';
        $this->logoId = null;
    }

    public function render()
    {
        return view('livewire.admin.website.header', [
            'logo' => Logo::first(),
        ]);
    }
}
