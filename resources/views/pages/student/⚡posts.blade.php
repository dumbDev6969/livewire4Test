<?php

use Livewire\Component;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
new class extends Component
{
    public $posts;

    public function mount(Post $posts)
    {
        $this->posts = Post::where('user_id', Auth::id())->get();
    }
};
?>

<div>
    {{-- Nothing worth having comes easy. - Theodore Roosevelt --}}
    <livewire:posts.post :items="$posts" />
</div>