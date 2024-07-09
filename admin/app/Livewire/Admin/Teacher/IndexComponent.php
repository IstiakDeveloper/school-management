<?php

namespace App\Livewire\Admin\Teacher;

use Livewire\Component;
use App\Models\Teacher;
use Livewire\WithPagination;

class IndexComponent extends Component
{
    use WithPagination;

    public $searchTerm;

    public function render()
    {
        $searchTerm = '%' . $this->searchTerm . '%';
        $teachers = Teacher::where('name_bn', 'like', $searchTerm)
                            ->orWhere('name_en', 'like', $searchTerm)
                            ->orWhere('mobile_number', 'like', $searchTerm)
                            ->paginate(10);

        return view('livewire.admin.teacher.index-component', ['teachers' => $teachers]);
    }

    public function deleteTeacher($teacherId)
    {
        $teacher = Teacher::find($teacherId);
        if ($teacher) {
            $teacher->delete();
            flash()->success('Teacher deleted successfully.!');
        }
    }

}
