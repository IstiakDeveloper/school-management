<?php

namespace App\Livewire\Admin\Website;

use App\Models\StudentReview;
use App\Models\StudentReviewItem;
use Livewire\Component;

class StudentReviewComponent extends Component
{
    public $main_title;
    public $description;
    public $reviews = [];
    public $review_stars;
    public $review_summary;
    public $review_name;

    protected $rules = [
        'main_title' => 'required|string|max:255',
        'description' => 'required|string|max:1000',
        'reviews.*.stars' => 'required|integer|between:1,5',
        'reviews.*.summary' => 'nullable|string|max:255',
        'reviews.*.name' => 'required|string|max:255',
    ];

    public function mount()
    {
        $section = StudentReview::first();
        if ($section) {
            $this->main_title = $section->main_title;
            $this->description = $section->description;
        }

        $this->reviews = StudentReviewItem::all()->toArray();
    }

    public function storeSection()
    {
        $this->validate();

        $section = StudentReview::first();
        if ($section) {
            $section->update([
                'main_title' => $this->main_title,
                'description' => $this->description,
            ]);
        } else {
            StudentReview::create([
                'main_title' => $this->main_title,
                'description' => $this->description,
            ]);
        }

        flash()->success('Student Reviews Section updated successfully.');
    }

    public function storeReview()
    {
        $this->validate([
            'review_stars' => 'required|integer|between:1,5',
            'review_summary' => 'nullable|string|max:255',
            'review_name' => 'required|string|max:255',
        ]);

        $review = StudentReviewItem::create([
            'stars' => $this->review_stars,
            'summary' => $this->review_summary,
            'name' => $this->review_name,
        ]);

        $this->reviews[] = $review->toArray();
        $this->resetReviewInputFields();

        flash()->success('Student Review added successfully.');
    }

    public function deleteReview($id)
    {
        $review = StudentReviewItem::find($id);
        if ($review) {
            $review->delete();
            $this->reviews = array_filter($this->reviews, fn($r) => $r['id'] != $id);
            flash()->success('Student Review deleted successfully.');
        }
    }

    private function resetReviewInputFields()
    {
        $this->review_stars = '';
        $this->review_summary = '';
        $this->review_name = '';
    }

    public function render()
    {
        return view('livewire.admin.website.student-review-component');
    }

}
