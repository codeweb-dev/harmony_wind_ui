<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;
use Spatie\Permission\Models\Role;

new #[Layout('layouts.app')] class extends Component {
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered(($user = User::create($validated))));

        $user->assignRole('user');

        Auth::login($user);

        $this->redirect(route('welcome', absolute: false), navigate: true);
    }
}; ?>

<div class="flex min-h-screen flex-col justify-center px-6 py-12 lg:px-8 text-primary-white">
    {{-- <form wire:submit="register">
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input wire:model="password" id="password" class="block mt-1 w-full" type="password" name="password"
                required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input wire:model="password_confirmation" id="password_confirmation" class="block mt-1 w-full"
                type="password" name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('login') }}" wire:navigate>
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form> --}}

    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <h1 class="text-center font-bold text-2xl"><a href="{{ route('welcome') }}" wire:navigate>Welcome to Harmony Wind
                UI</a></h1>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <form wire:submit="register">
            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium leading-6">Name</label>
                <div class="mt-1">
                    <x-mary-input wire:model="name" id="name" type="text" placeholder="Your Name"
                        class="block w-full rounded-md bg-transparent border-0 py-1.5 ring-1 ring-inset ring-border-color placeholder:text-muted-color focus:ring-2 focus:ring-inset focus:ring-white sm:leading-6" />
                </div>
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <label for="email" class="block text-sm font-medium leading-6">Email address</label>
                <div class="mt-1">
                    <x-mary-input wire:model="email" id="email" type="email" placeholder="email@example.com"
                        class="block w-full rounded-md bg-transparent border-0 py-1.5 ring-1 ring-inset ring-border-color placeholder:text-muted-color focus:ring-2 focus:ring-inset focus:ring-white sm:leading-6" />
                </div>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <label for="password" class="block text-sm font-medium leading-6">Password</label>
                <div class="mt-1">
                    <x-mary-password wire:model="password" right id="password" placeholder="Password"
                        class="block w-full rounded-md bg-transparent border-0 py-1.5 ring-1 ring-inset ring-border-color placeholder:text-muted-color focus:ring-2 focus:ring-inset focus:ring-white sm:leading-6" />
                </div>
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <label for="password_confirmation" class="block text-sm font-medium leading-6">Confirm Password</label>
                <div class="mt-1">
                    <x-mary-password wire:model="password_confirmation" right id="password_confirmation"
                        placeholder="Confirm Password"
                        class="block w-full rounded-md bg-transparent border-0 py-1.5 ring-1 ring-inset ring-border-color placeholder:text-muted-color focus:ring-2 focus:ring-inset focus:ring-white sm:leading-6" />
                </div>
            </div>

            <!-- Register Button -->
            <div class="mt-6">
                <x-mary-button label="Register" type="submit"
                    class="flex w-full justify-center rounded-md bg-white px-3 text-sm font-semibold leading-6 text-primary-dark shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:bg-white" />
            </div>

            <!-- Already Registered Link -->
            <p class="mt-10 text-center text-sm text-primary-white">
                Already registered?
                <a href="{{ route('login') }}" class="font-semibold leading-6 text-muted-color" wire:navigate>Log in</a>
            </p>
        </form>
    </div>

</div>
