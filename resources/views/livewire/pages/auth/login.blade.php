<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.app')] class extends Component {
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: route('welcome', absolute: false), navigate: true);
    }
}; ?>

<div class="flex min-h-screen flex-col justify-center px-6 py-12 lg:px-8 text-primary-white">

    {{-- <form wire:submit="login">
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="form.email" id="email" class="block mt-1 w-full" type="email" name="email"
                required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input wire:model="form.password" id="password" class="block mt-1 w-full" type="password"
                name="password" required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember" class="inline-flex items-center">
                <input wire:model="form.remember" id="remember" type="checkbox"
                    class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                    name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                    href="{{ route('password.request') }}" wire:navigate>
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form> --}}

    <div class="sm:mx-auto sm:w-full sm:max-w-sm flex items-center justify-center gap-1">
        <x-bi-wind class="w-10 h-10 font-black mr-2" />
        <h1 class="text-center font-bold text-2xl"><a href="{{ route('welcome') }}" wire:navigate>Harmony Wind UI</a></h1>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <form wire:submit.prevent="login">
            <!-- Email Address -->
            <div>
                <label for="email" class="block text-sm font-medium leading-6">Email address</label>
                <div class="mt-1">
                    <x-mary-input wire:model="form.email" type="email" placeholder="email@example.com"
                        class="block w-full rounded-md bg-transparent border-0 py-1.5 ring-1 ring-inset ring-border-color placeholder:text-muted-color focus:ring-2 focus:ring-inset focus:ring-white sm:leading-6" />
                </div>
            </div>

            <!-- Password -->
            <div class="mt-6">
                <div class="flex items-center justify-between">
                    <label for="password" class="block text-sm font-medium leading-6">Password</label>
                    <div class="text-sm">
                        @if (Route::has('password.request'))
                            <a class="font-semibold text-muted-color" href="{{ route('password.request') }}"
                                wire:navigate>
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                    </div>
                </div>
                <div class="mt-1">
                    <x-mary-password wire:model="form.password" right
                        class="block w-full rounded-md bg-transparent border-0 py-1.5 ring-1 ring-inset ring-border-color placeholder:text-muted-color focus:ring-2 focus:ring-inset focus:ring-white sm:leading-6" />
                </div>
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember" class="inline-flex items-center">
                    <input wire:model="form.remember" id="remember" type="checkbox"
                        class="rounded bg-transparent border-border-color text-border-color shadow-sm" name="remember">
                    <span class="ms-2 text-sm text-muted-color">{{ __('Remember me') }}</span>
                </label>
            </div>

            <!-- Login Button -->
            <div class="mt-6">
                <x-mary-button label="Log in"
                    class="flex w-full justify-center rounded-md bg-white px-3 text-sm font-semibold leading-6 text-primary-dark shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:bg-white"
                    type="submit" spinner="login" />
            </div>
        </form>

        <p class="mt-10 text-center text-sm text-primary-white">
            First time around here?
            <a href="{{ route('register') }}" class="font-semibold leading-6 text-muted-color" wire:navigate>Sign up</a>
        </p>
    </div>
</div>
