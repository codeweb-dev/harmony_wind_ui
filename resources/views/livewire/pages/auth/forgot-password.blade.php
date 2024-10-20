<?php

use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;
use Mary\Traits\Toast;

new #[Layout('layouts.app')] class extends Component {
    use Toast;
    public string $email = '';

    /**
     * Send a password reset link to the provided email address.
     */
    public function sendPasswordResetLink(): void
    {
        $this->validate([
            'email' => ['required', 'string', 'email'],
        ]);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::sendResetLink($this->only('email'));

        if ($status != Password::RESET_LINK_SENT) {
            $this->error(__($status));

            return;
        }

        $this->reset('email');

        $this->success(__($status));
    }
}; ?>

<div class="flex min-h-screen flex-col justify-center px-6 py-12 lg:px-8 text-primary-white">
    {{-- <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div> --}}

    <div class="sm:mx-auto sm:w-full sm:max-w-sm flex items-center justify-center gap-1 mb-10">
        <x-bi-wind class="w-10 h-10 font-black mr-2" />
        <h1 class="text-center font-bold text-2xl"><a href="{{ route('welcome') }}" wire:navigate>Harmony Wind UI</a></h1>
    </div>

    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <p class="text-sm">Forgot your password? No problem. Just let us know your email address
            and we will email you a password reset link that will allow you to choose a new one.</p>
    </div>

    <div class="mt-6 sm:mx-auto sm:w-full sm:max-w-sm">
        <form wire:submit="sendPasswordResetLink">
            <!-- Email Address -->
            {{-- <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email"
                    required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div> --}}
            <div>
                <label for="email" class="block text-sm font-medium leading-6">Email</label>
                <div class="mt-1">
                    <x-mary-input wire:model="email" type="email" clearable placeholder="email@example.com"
                        class="block w-full rounded-md bg-transparent border-0 py-1.5 ring-1 ring-inset ring-border-color placeholder:text-muted-color focus:ring-2 focus:ring-inset focus:ring-white sm:leading-6" />
                </div>
            </div>

            {{-- <div class="flex items-center justify-end mt-4">
                <x-primary-button>
                    {{ __('Email Password Reset Link') }}
                </x-primary-button>
            </div> --}}
            <div class="mt-6">
                <x-mary-button label="Email Password Reset Link"
                    class="flex w-full justify-center rounded-md bg-white px-3 text-sm font-semibold leading-6 text-primary-dark shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:bg-white"
                    type="submit" />
            </div>
        </form>
    </div>
</div>
