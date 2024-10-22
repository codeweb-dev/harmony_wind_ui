<?php

namespace App\Livewire\User;

use App\Models\Blog;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Mary\Traits\Toast;

#[Layout('layouts.app')]
class ShowBlog extends Component
{
    use Toast;
    public $blog;

    public function mount(Blog $blog)
    {
        $this->blog = $blog;

        $this->incrementView();
    }

    public function incrementView()
    {
        $sessionKey = 'blog_viewed_' . $this->blog->id;

        if (!session()->has($sessionKey)) {
            $this->blog->increment('views');

            session()->put($sessionKey, true);
        }
    }

    public function like()
    {
        $sessionKey = 'blog_liked_' . $this->blog->id;

        if (!session()->has($sessionKey)) {
            $this->blog->increment('likes');
            session()->put($sessionKey, true);
            $this->success("Like the blog");
        } else {
            $this->error("You already liked the blog");
        }
    }

    public function dislike()
    {
        $sessionKey = 'blog_disliked_' . $this->blog->id;

        if (!session()->has($sessionKey)) {
            $this->blog->increment('dislikes');
            session()->put($sessionKey, true);
            $this->success("Dislike the blog");
        } else {
            $this->error("You already disliked the blog");
        }
    }


    public function render()
    {
        return view('livewire.user.show-blog', [
            'blog' => $this->blog,
        ]);
    }
}
