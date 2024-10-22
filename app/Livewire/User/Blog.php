<?php

namespace App\Livewire\User;

use App\Models\Blog as ModelsBlog;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class Blog extends Component
{
    public $blogs;

    public function mount()
    {
        $this->blogs = ModelsBlog::all();
    }
    public function render()
    {
        return view('livewire.user.blog', [
            'blogs' => ModelsBlog::all(),
        ]);
    }
}
