<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class Welcome extends Component
{
    public int $userCount = 0;

    public function mount(): void
    {
        $this->userCount = User::count();
    }
    public function render()
    {
        return view('livewire.welcome', [
            'userCount' => $this->userCount,
        ]);
    }
}
