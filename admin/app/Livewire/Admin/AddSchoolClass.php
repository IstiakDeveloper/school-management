<?php

namespace App\Livewire\Admin;

use App\Models\Branch;
use App\Models\SchoolClass;
use Livewire\Component;

class AddSchoolClass extends Component
{
    public $name;

    public function render()
    {
        $classes = SchoolClass::with('branches')->get();
        return view('livewire.admin.add-school-class', compact('classes'));
    }

    public function submit()
    {
        $validatedData = $this->validate([
            'name' => 'required|string|max:255',
        ]);

        // Create new school class
        $schoolClass = SchoolClass::create([
            'name' => $validatedData['name'],
        ]);

        // Get all branches
        $branches = Branch::all();

        // Attach all branches to the newly created school class
        $schoolClass->branches()->attach($branches);

        // Clear input fields
        $this->name = '';

        // Emit an event to refresh the view
        $this->dispatch('schoolClassAdded');
    }

}
