<?php

use Livewire\Component;
use App\Livewire\Forms\PostForm;
use App\Models\Post;
new class extends Component
{
    public PostForm $form;

    public function mount (Post $post)
    {
        $this->form->setPost($post);
    }

    public function save()
    {
        // Call the update method to update the post
        $this->form->update();

        session()->flash('success', 'Post updated successfully.');

        $this->redirect(route('student.posts'), navigate: true);
    }
};
?>

<div>
    {{-- Do what you can, with what you have, where you are. - Theodore Roosevelt --}}
    <form wire:submit.prevent="save" class="w-full max-w-lg flex flex-col gap-4 ">

        
        <flux:input label="Title" wire:model.blur="form.title"/>

        <flux:input label="Description" wire:model.blur="form.body"/>

        <flux:button variant="primary" type="submit" class="data-loading:opacity-50">Save</flux:button>

        <span class="not-data-loading:hidden">Saving...</span>
    </form>
</div>