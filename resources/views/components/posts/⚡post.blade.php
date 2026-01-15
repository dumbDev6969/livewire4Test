<?php

use Livewire\Component;

new class extends Component
{
    // Your component logic here
};
?>
@props([
    'items'
])


    {{-- If you do not have a consistent goal in life, you can not live it in a consistent way. - Marcus Aurelius --}}
<ul class="list-none w-1/2 mb-0">
    @foreach ($items as $item)
        <li class="mb-4 p-4 border border-gray-300 rounded-lg" wire:key="item-{{ $item->id }}">
            <flux:heading size="xl">{{ $item->title }}</flux:heading>
            <flux:text>{{ $item->body }}</flux:text>
        </li>
    @endforeach
</ul>
