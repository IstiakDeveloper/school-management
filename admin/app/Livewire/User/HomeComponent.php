<?php

namespace App\Livewire\User;

use App\Models\Blog;
use App\Models\HeroSection;
use App\Models\Logo;
use App\Models\SmarterLearnerSection;
use App\Models\StudentReview;
use App\Models\StudentReviewItem;
use App\Models\VideoClass;
use App\Models\VideoClassesSection;
use Livewire\Component;

class HomeComponent extends Component
{
    public $logo;
    public $blogs;
    public $videoClasses;
    public $videoClassesSection;
    public $smarterLearnerSection;
    public $studentReviews;
    public $heroSection;
    public $studentReviewItems;
    public $latestBlog;
    public $lastFiveBlogs;

    public function mount()
    {
        $this->blogs = Blog::all();
        $this->videoClasses = VideoClass::all();
        $this->videoClassesSection = VideoClassesSection::first();
        $this->smarterLearnerSection = SmarterLearnerSection::first();
        $this->studentReviews = StudentReview::first();
        $this->studentReviewItems = StudentReviewItem::all();
        $this->heroSection = HeroSection::first();
        $this->latestBlog = Blog::latest()->first();
        $this->lastFiveBlogs = Blog::latest()->take(5)->get();
    }

    public function render()
    {
        return view('livewire.user.home-component', [
            'blogs' => $this->blogs,
            'videoClasses' => $this->videoClasses,
            'videoClassesSection' => $this->videoClassesSection,
            'smarterLearnerSection' => $this->smarterLearnerSection,
            'studentReviews' => $this->studentReviews,
            'studentReviewItems' => $this->studentReviewItems,
            'heroSection' => $this->heroSection,
            'latestBlog' => $this->latestBlog,
            'lastFiveBlogs' => $this->lastFiveBlogs,
        ])->layout('layouts.front');
    }

}
