<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
class PostForm extends Form
{
    public ?Post $post;

    #[Validate('required|string|max:255|min:3')]
    public string $title = '';

    #[Validate('required|string|max:255|min:5')]
    public string $body = '';

    public function setPost(Post $post)
    {
        $this->post = $post;

        $this->title = $post->title;

        $this->body = $post->body;
    }

    // Method to store post
    public function store()
    {
        $this->validate();

        // Create the post
        Post::create([
            'title' => $this->title,
            'body' => $this->body,
            'user_id' => Auth::id(),
        ]);

    }

    // Method to update post
    public function update()
    {
        $this->validate();

        $this->post->update(
            $this->only(['title', 'body']) 
        );
    }
}
