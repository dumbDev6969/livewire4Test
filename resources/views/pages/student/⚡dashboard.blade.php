<?php

use Livewire\Component;
use App\Models\Post;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
new class extends Component
{
    // Create a listener
    #[On('post-created')] 
    #[On('post-deleted')]
    public function updatePost()
    {
        // This is just a listener
    }

    #[Computed]
    public function postCount()
    {
        // Return the current logged in user's posts
        return Auth::user()->posts()->count();
    }
};
?>

<div class=" min-h-screen">
    {{-- Life is available only in the present moment. - Thich Nhat Hanh --}}
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl " wire:poll.visible>
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <div class="p-6 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 flex flex-col gap-4">
                <flux:text>Lorem</flux:text>
                <flux:heading size="xl">{{ $this->postCount }}</flux:heading>
                <div class="flex items-center gap-2">
                    <flux:icon.arrow-trending-up variant="micro" class="text-green-600 dark:text-green-500" />
                    <span class="text-sm text-green-600 dark:text-green-500">1.2% since last day</span>
                </div>
            </div>
            <div class="p-6 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 flex flex-col gap-4">
                <flux:text>Ipsum</flux:text>
                <flux:heading size="xl">$3,799.00</flux:heading>
                <div class="flex items-center gap-2">
                    <flux:icon.arrow-trending-down variant="micro" class="text-red-600 dark:text-red-500" />
                    <span class="text-sm text-red-600 dark:text-red-500">15.2% since last day</span>
                </div>
            </div>
            <div class="p-6 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 flex flex-col gap-4">
                <flux:text>Dolor</flux:text>
                <flux:heading size="xl">All of them</flux:heading>
                <div class="flex items-center gap-2">
                    <flux:icon.arrow-trending-up variant="micro" class="text-green-600 dark:text-green-500" />
                    <span class="text-sm text-green-600 dark:text-green-500">69% molesterness</span>
                </div>
            </div>
            
        </div>
        <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
            
        </div>
    </div>
</div>