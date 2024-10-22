<?php

use App\Models\Components;
use Livewire\Volt\Component;
use Livewire\Attributes\Layout;

new #[Layout('layouts.app')] class extends Component {
    public array $components = [];

    /**
     * Fetch all components on mount.
     */
    public function mount(): void
    {
        $this->components = Components::all()->toArray();
    }

    /**
     * Render the component view with dynamic components.
     */
    public function render(): mixed
    {
        return view('livewire.user.partials.side-navigation', [
            'components' => $this->components,
        ]);
    }
}; ?>

<nav class="flex flex-col gap-2">
    @foreach ($components as $component)
        <div wire:key="{{ $component['id'] }}" class="flex items-center gap-3">
            <a href="{{ url('/components/' . $component['id']) }}"
                class="text-sm hover:underline {{ request()->is('components/' . $component['id']) ? 'text-primary-white' : 'text-muted-color' }}"
                wire:navigate>
                {{ $component['name'] }}
            </a>
            <x-mary-badge value="New" />
        </div>
    @endforeach
</nav>
