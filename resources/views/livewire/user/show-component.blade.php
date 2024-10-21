<div class="min-h-screen flex bg-custom-background text-primary-white">
    <aside class="w-72 p-4 px-10 fixed h-full overflow-y-auto hover:overflow-y-scroll mt-16">
        <h2 class="font-bold mb-3">Components</h2>
        <livewire:user.partials.side-navigation />
    </aside>

    <main class="flex-1 ml-72 p-6 w-full">
        <div class="mt-16">
            <h1 class="text-2xl font-bold my-1">{{ $component->name }}</h1>
            <p class="text-lg font-bold text-muted-color">{{ $component->description }}</p>
            add the preview style for the code
            <div class="mx-auto max-w-3xl mt-20 relative">
                <pre class="rounded-lg"`><code class="language-html rounded-lg">{{ $component->tailwind_code }}</code></pre>

                <input type="hidden" id="codeToCopy" value="{{ $component->tailwind_code }}">

                <x-mary-button id="copyIcon" class="copy-button btn-ghost btn-sm absolute top-3 right-3"
                    data-clipboard-target="#codeToCopy">
                    <x-heroicon-o-clipboard class="w-4 h-4" />
                </x-mary-button>

                <x-mary-button id="checkIcon" class="btn-ghost btn-sm absolute top-3 right-3 hidden">
                    <x-heroicon-o-check class="w-4 h-4" />
                </x-mary-button>
            </div>
        </div>
    </main>
</div>
