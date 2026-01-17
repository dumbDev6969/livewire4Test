<?php

use Livewire\Component;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Attributes\Computed;

new class extends Component
{
    public $search = '';

    #[Computed]
    public function myPosts()
    {
        // Return the current logged in user's posts
        if ($this->search) {
            return Post::where('title', 'LIKE', '%' . $this->search . '%')->get();
        }
        return Auth::user()->posts;
    }

    

    #[On('delete-post')]
    public function delete(Post $post)
    {
        // Delete the post
        $post->delete();
    }
};
?>

<div>
    {{-- Nothing worth having comes easy. - Theodore Roosevelt --}}
    <flux:input wire:model.live.debounce.1000ms="search" wire:keydown.enter="$refresh"/>
    <livewire:posts.post :items="$this->myPosts" />
    
</div>