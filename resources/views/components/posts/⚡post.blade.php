<?php

use Livewire\Component;
use Livewire\Attributes\Reactive;
new class extends Component
{
    // Your component logic here

    #[Reactive]
    public $items; // To react to changes in the parent
};
?>

<ul class="list-none w-1/2 mb-0">
    @foreach ($items as $item)
        <li class="mb-4 p-4 border border-gray-300 rounded-lg" wire:key="item-{{ $item->id }}">
            <flux:heading size="xl">{{ $item->title }}</flux:heading>
            <flux:text>{{ $item->body }}</flux:text>
            
            {{-- Updated Dispatch Syntax --}}
            <flux:button 
                size="sm" 
                variant="danger" 
                wire:click="$dispatch('delete-post', { post: {{ $item->id }} })"
                
            >
                Delete
            </flux:button>
            
            <a href="{{ route('edit.post', ['post' => $item->id]) }}">
                <flux:button size="sm" variant="filled">
                    Edit
                </flux:button>
            </a>
            

        </li>
    @endforeach
</ul>
