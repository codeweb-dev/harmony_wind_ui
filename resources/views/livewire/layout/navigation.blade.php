<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component {
    /**
     * Log the current user out of the application.
     */
    public bool $nav_bar = false;

    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>
<nav x-data="{ open: false }" class="bg-custom-background text-primary-white fixed top-0 w-full z-50">
    <div class="w-full flex items-center justify-between">
        <x-mary-drawer wire:model="nav_bar" class="w-9/12 bg-custom-background text-primary-white">
            <div class="flex items-center justify-between w-full">
                <a href="{{ route('welcome') }}" wire:navigate>
                    <x-bi-wind class="w-5 h-5 font-black inline-flex mr-2" /> Harmony Wind UI
                </a>
                <x-mary-button icon="c-x-mark" @click="$wire.nav_bar = false" class="btn-ghost" />
            </div>
        </x-mary-drawer>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center">
                    <div class="shrink-0 flex items-center text-sm font-bold gap-2">
                        <x-mary-button icon="o-bars-3-bottom-left" wire:click="$toggle('nav_bar')"
                            class="text-2xl md:hidden btn-ghost" />
                        <a href="{{ route('welcome') }}" wire:navigate class="hidden md:block">
                            <x-bi-wind class="w-5 h-5 font-black inline-flex mr-2" /> Harmony Wind UI
                        </a>
                    </div>

                    <div class="hidden space-x-8 sm:flex sm:ml-10">
                        <x-nav-link :href="route('login')" :active="request()->routeIs('login')" wire:navigate>
                            {{ __('Components') }}
                        </x-nav-link>
                        <x-nav-link :href="route('login')" :active="request()->routeIs('login')" wire:navigate>
                            {{ __('Templates') }}
                        </x-nav-link>
                        @role('admin')
                            <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')" wire:navigate>
                                {{ __('Admin dashboard') }}
                            </x-nav-link>
                        @endrole
                    </div>
                </div>

                <div class="flex items-center justify-end">
                    @auth
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="inline-flex items-center px-3 py-2">
                                    <div x-text="'{{ auth()->user()->name }}'"></div>
                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <x-dropdown-link :href="route('user.profile')" wire:navigate>
                                    {{ __('Profile') }}
                                </x-dropdown-link>
                                <button wire:click="logout" class="w-full text-start">
                                    <x-dropdown-link>{{ __('Log Out') }}</x-dropdown-link>
                                </button>
                            </x-slot>
                        </x-dropdown>
                    @else
                        <div>
                            <a href="{{ route('login') }}" wire:navigate>
                                <button
                                    class="flex w-full justify-center rounded-md bg-white px-3 py-1 text-sm font-semibold leading-6 text-primary-dark shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:bg-white">Log
                                    in</button>
                            </a>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</nav>
