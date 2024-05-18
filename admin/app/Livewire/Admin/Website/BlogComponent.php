<?php

namespace App\Livewire\Admin\Website;

use App\Models\Blog;
use App\Models\BlogSection;
use Livewire\Component;
use Livewire\WithFileUploads;

class BlogComponent extends Component
{
    use WithFileUploads;

    public $main_title;
    public $description;
    public $background_image;
    public $background_image_path;
    public $title;
    public $content;
    public $thumbnail;
    public $thumbnail_path;
    public $blogs = [];
    public $blogId = null;

    protected $rules = [
        'main_title' => 'required|string|max:255',
        'description' => 'required|string|max:1000',
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'thumbnail' => 'nullable|image|max:1024',
        'background_image' => 'nullable|image|max:1024',
    ];

    public function mount()
    {
        $section = BlogSection::first();
        if ($section) {
            $this->main_title = $section->main_title;
            $this->description = $section->description;
            $this->background_image_path = $section->background_image;
        }

        $this->blogs = Blog::all()->toArray();
    }

    public function storeSection()
    {
        $this->validate();

        $section = BlogSection::first();
        if ($section) {
            $section->update([
                'main_title' => $this->main_title,
                'description' => $this->description,
                'background_image' => $this->background_image_path,
            ]);
        } else {
            BlogSection::create([
                'main_title' => $this->main_title,
                'description' => $this->description,
                'background_image' => $this->background_image_path,
            ]);
        }

        flash()->success('Student Blog Section updated successfully.');
    }
    public function storeBlog()
    {
        $this->validate();

        if ($this->thumbnail) {
            $this->thumbnail_path = $this->thumbnail->store('thumbnails', 'public');
        }

        $blog = Blog::create([
            'title' => $this->title,
            'content' => $this->content,
            'thumbnail' => $this->thumbnail_path,
        ]);

        $this->blogs[] = $blog->toArray();
        $this->resetInputFields();

        session()->flash('message', 'Blog added successfully.');
    }

    public function editBlog($id)
    {
        $blog = Blog::findOrFail($id);
        $this->blogId = $id;
        $this->title = $blog->title;
        $this->content = $blog->content;
        $this->thumbnail_path = $blog->thumbnail;
    }

    public function updateBlog()
    {
        $this->validate();

        if ($this->blogId) {
            $blog = Blog::find($this->blogId);

            if ($this->thumbnail) {
                $this->thumbnail_path = $this->thumbnail->store('thumbnails', 'public');
            }

            $blog->update([
                'title' => $this->title,
                'content' => $this->content,
                'thumbnail' => $this->thumbnail_path,
            ]);

            $this->resetInputFields();

            session()->flash('message', 'Blog updated successfully.');
        }
    }

    public function deleteBlog($id)
    {
        $blog = Blog::find($id);
        if ($blog) {
            $blog->delete();
            $this->blogs = array_filter($this->blogs, fn($blog) => $blog['id'] != $id);
            session()->flash('message', 'Blog deleted successfully.');
        }
    }

    private function resetInputFields()
    {
        $this->title = '';
        $this->content = '';
        $this->thumbnail = null;
        $this->thumbnail_path = '';
        $this->blogId = null;
    }

    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        return view('blog.show', compact('blog'));
    }

    public function render()
    {
        return view('livewire.admin.website.blog-component');
    }
}
