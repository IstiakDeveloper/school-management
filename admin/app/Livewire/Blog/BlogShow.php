<?php

namespace App\Livewire\Blog;

use App\Models\Blog;
use Livewire\Component;

class BlogShow extends Component
{
    public $blog;

    public function mount($id)
    {
        $this->blog = Blog::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.blog.blog-show')->layout('layouts.front');
    }

}
