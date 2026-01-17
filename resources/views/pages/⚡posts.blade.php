<?php

use Livewire\Component;
use App\Models\Post;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
new class extends Component
{
    public $search = '';
    #[Computed] 
    public function posts()
    {
        if ($this->search) {
            return Post::where('title', 'LIKE', '%' . $this->search . '%')->get();
        }
        return Post::all();
    }

    #[On('delete-post')]
    public function delete(Post $post)
    {
        $post->delete();
    }
    
};
?>

<div class="flex items-center justify-center flex-col min-h-screen ">
    {{-- Well begun is half done. - Aristotle --}}
    <flux:input wire:model.live.debounce.1000ms="search" wire:keydown.enter="$refresh"/>
    <livewire:posts.post :items="$this->posts" />
    
</div>
