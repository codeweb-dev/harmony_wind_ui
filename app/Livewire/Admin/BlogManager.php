<?php

namespace App\Livewire\Admin;

use App\Models\Blog;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Mary\Traits\Toast;

#[Layout('layouts.app')]
class BlogManager extends Component
{
    use Toast;
    public $blogs, $name, $description, $blogId;
    public bool $editForm = false;

    public $headers = [
        ['key' => 'id', 'label' => '#'],
        ['key' => 'name', 'label' => 'Name'],
    ];

    protected $rules = [
        'name' => 'required|string',
        'description' => 'required|string',
    ];

    public function mount()
    {
        $this->blogs = Blog::all();
    }

    private function loadComponents()
    {
        $this->blogs = Blog::all();
    }

    public function create()
    {
        $this->validate();
        Blog::create([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        $this->success("Succesfully created new blog");
        $this->resetFields();

        $this->loadComponents();
    }

    public function edit($id)
    {
        $blog = Blog::find($id);
        $this->name = $blog->name;
        $this->description = $blog->description;
        $this->blogId = $blog->id;
        $this->editForm = true;
    }

    public function update()
    {
        $this->validate();

        Blog::find($this->blogId)->update([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        $this->success("Succesfully edited blog");
        $this->resetFields();

        $this->editForm = false;
        $this->loadComponents();
    }

    public function delete($id)
    {
        Blog::find($id)->delete();

        $this->success("Succesfully deleted blog");
        $this->loadComponents();
    }

    private function resetFields()
    {
        $this->name = '';
        $this->description = '';
        $this->blogId = null;
    }

    public function render()
    {
        return view('livewire.admin.blog-manager', [
            'blogs' => Blog::all(),
            'headers' => $this->headers,
        ]);
    }
}
