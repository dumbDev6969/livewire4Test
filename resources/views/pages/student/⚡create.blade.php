<?php

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\Post;
use App\Livewire\Forms\PostForm;
use Illuminate\Support\Facades\Auth;

new class extends Component
{
    public PostForm $form;
    public function save()
    {
        // Call the store method to store the post
        $this->form->store();

        session()->flash('success', 'Post created successfully.');
        $this->redirect(route('student.posts'), navigate: true);
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
        
        <flux:input label="Title" wire:model.blur="form.title"/>

        <flux:input label="Description" wire:model.blur="form.body"/>

        <flux:button variant="primary" type="submit" class="data-loading:opacity-50">Save</flux:button>

        <span class="not-data-loading:hidden">Saving...</span>
    </form>

    <a href="/dashboard" wire:navigate.hover>Posts</a>
</div>