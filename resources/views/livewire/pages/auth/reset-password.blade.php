<?php

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Volt\Component;
use Mary\Traits\Toast;

new #[Layout('layouts.app')] class extends Component {
    #[Locked]
    public string $token = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';
    use Toast;

    /**
     * Mount the component.
     */
    public function mount(string $token): void
    {
        $this->token = $token;

        $this->email = request()->string('email');
    }

    /**
     * Reset the password for the given user.
     */
    public function resetPassword(): void
    {
        $this->validate([
            'token' => ['required'],
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        // Here we will attempt to reset the user's password. If it is successful we
        // will update the password on an actual user model and persist it to the
        // database. Otherwise we will parse the error and return the response.
        $status = Password::reset($this->only('email', 'password', 'password_confirmation', 'token'), function ($user) {
            $user
                ->forceFill([
                    'password' => Hash::make($this->password),
                    'remember_token' => Str::random(60),
                ])
                ->save();

            event(new PasswordReset($user));
        });

        // If the password was successfully reset, we will redirect the user back to
        // the application's home authenticated view. If there is an error we can
        // redirect them back to where they came from with their error message.
        if ($status != Password::PASSWORD_RESET) {
            $this->error(__($status));

            return;
        }

        $this->success(__($status));

        $this->redirectRoute('login', navigate: true);
    }
}; ?>

<div class="flex min-h-screen flex-col justify-center px-6 py-12 lg:px-8 text-primary-white">
    {{-- <form wire:submit="resetPassword">
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email" required
                autofocus autocomplete="username" />
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
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form> --}}

    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <h1 class="text-center font-bold text-2xl"><a href="{{ route('welcome') }}" wire:navigate>Reset password</a>
        </h1>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <form wire:submit="resetPassword">
            <!-- Email Address -->
            <div>
                <label for="email" class="block text-sm font-medium leading-6">Email address</label>
                <div class="mt-1">
                    <x-mary-input wire:model="email" type="email" disabled placeholder="email@example.com"
                        class="block w-full rounded-md bg-transparent border-0 py-1.5 ring-1 ring-inset ring-border-color placeholder:text-muted-color focus:ring-2 focus:ring-inset focus:ring-white sm:leading-6" />
                </div>
            </div>

            <!-- Password -->
            <div class="mt-6">
                <div class="flex items-center justify-between">
                    <label for="password" class="block text-sm font-medium leading-6">Password</label>
                </div>
                <div class="mt-1">
                    <x-mary-password wire:model="password" right
                        class="block w-full rounded-md bg-transparent border-0 py-1.5 ring-1 ring-inset ring-border-color placeholder:text-muted-color focus:ring-2 focus:ring-inset focus:ring-white sm:leading-6" />
                </div>
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-mary-password wire:model="password_confirmation" right
                    class="block w-full rounded-md bg-transparent border-0 py-1.5 ring-1 ring-inset ring-border-color placeholder:text-muted-color focus:ring-2 focus:ring-inset focus:ring-white sm:leading-6" />
            </div>

            <!-- Reset Password Button -->
            <div class="mt-6">
                <x-mary-button label="Reset Password"
                    class="flex w-full justify-center rounded-md bg-white px-3 text-sm font-semibold leading-6 text-primary-dark shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:bg-white"
                    type="submit" />
            </div>
        </form>
    </div>

</div>
