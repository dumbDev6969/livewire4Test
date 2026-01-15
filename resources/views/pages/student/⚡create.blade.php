<?php

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

new class extends Component
{
    #[Validate('required|string|max:255|min:3')]
    public string $title = '';

    #[Validate('required|string|max:255|min:5')]
    public string $body = '';

    public function save()
    {
        $this->validate();

        Post::create([
            'title' => $this->title,
            'body' => $this->body,
            'user_id' => Auth::id(),
        ]);

        session()->flash('success', 'Post created successfully.');
        $this->redirect(route('student.create'));
    }
};
?>

<div class="grid min-h-screen place-items-center">
    
    {{-- Act only according to that maxim whereby you can, at the same time, will that it should become a universal law. - Immanuel Kant --}}
    <form wire:submit.prevent="save" class="w-full max-w-lg flex flex-col gap-4 ">
        @if (session('success'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-base bg-green-50 rounded">
                <span class="font-medium">{{ session('success') }}</span> 
            </div>
        @endif
        
        <flux:input label="Title" wire:model.blur="title"/>

        <flux:input label="Description" wire:model.blur="body"/>

        <flux:button variant="primary" type="submit">Save</flux:button>
    </form>
</div>