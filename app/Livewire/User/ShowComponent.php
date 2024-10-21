<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\Components;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class ShowComponent extends Component
{
    public $component, $components;

    public function mount(Components $component)
    {
        $this->component = $component;
        $this->components = Components::all();
    }

    public function render()
    {
        return view('livewire.user.show-component', [
            'components' => $this->components
        ]);
    }
}
