<?php

use Livewire\Component;
use App\Models\Post;

new class extends Component
{
    public $posts;

    public function mount()
    {
        $this->posts = Post::all();
    }
};
?>

<div class="flex items-center justify-center min-h-screen border">
    {{-- Well begun is half done. - Aristotle --}}
    <livewire:posts.post :items="$posts" />
    
</div>
