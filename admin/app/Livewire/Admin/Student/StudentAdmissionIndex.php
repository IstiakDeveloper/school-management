<?php

namespace App\Livewire\Admin\Student;

use App\Models\StudentAdmission;
use Livewire\Component;
use Livewire\WithPagination;

class StudentAdmissionIndex extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;
    public $sortField = 'created_at';
    public $sortAsc = false;
    public $confirmingStudentDeletion = false;
    public $studentIdToDelete;
    protected $queryString = ['search'];


    public function render()
    {
        $studentAdmissions = StudentAdmission::query()
            ->with('schoolClass')
            ->where('name_bn', 'like', '%' . $this->search . '%')
            ->orWhere('name_en', 'like', '%' . $this->search . '%')
            ->orWhere('student_id', 'like', '%' . $this->search . '%')
            ->orWhere('form_number', 'like', '%' . $this->search . '%')
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate($this->perPage);

        return view('livewire.admin.student.student-admission-index', [
            'studentAdmissions' => $studentAdmissions
        ]);
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function confirmDelete($studentId)
    {
        $this->confirmingStudentDeletion = true;
        $this->studentIdToDelete = $studentId;
    }

    public function delete()
    {
        $studentAdmission = StudentAdmission::findOrFail($this->studentIdToDelete);

        if ($studentAdmission) {
            $studentAdmission->delete();
            flash()->success('Student admission deleted successfully.');
        } else {
            flash()->error('Student admission not found.');
        }

        // Reset confirmation state
        $this->confirmingStudentDeletion = false;
    }
}
