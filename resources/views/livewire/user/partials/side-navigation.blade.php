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
        <a href="{{ url('/components/' . $component['id']) }}" class="text-sm text-muted-color hover:underline"
            wire:navigate>
            {{ $component['name'] }}
        </a>
    @endforeach
</nav>
