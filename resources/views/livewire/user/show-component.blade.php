<div class="min-h-screen flex bg-custom-background text-primary-white">
    <aside class="w-96 p-4 px-16 fixed h-full overflow-y-auto hover:overflow-y-scroll mt-20 left-0 hidden lg:block">
        <h2 class="font-bold mb-3">Components</h2>
        <livewire:user.partials.side-navigation />
    </aside>

    <main class="flex-1 xl:mx-96 lg:ml-96 p-6 w-full">
        <div class="mt-20">
            <div class="flex items-center gap-1 text-sm mb-4">
                <p class="text-muted-color">Components</p>
                <x-heroicon-c-chevron-right class="w-5 h-5 text-muted-color" />
                <p>{{ $component->name }}</p>
            </div>

            <h1 class="text-3xl font-bold my-1" id="title-section">{{ $component->name }}</h1>
            <p class="text-sm font-bold text-muted-color">{{ $component->description }}</p>

            <div class="mt-12" id="preview-section">
                <h3 class="mb-1 text-muted-color text-sm">Preview</h3>
                <div
                    class="flex items-center justify-center bg-transparent rounded-lg border border-border-color h-[20rem]">
                    <div>
                        {!! $component->tailwind_code !!}
                    </div>
                </div>
            </div>

            <div class="mt-12" id="code-section">
                <h3 class="-mb-5 text-muted-color text-sm">Code</h3>
                <div class="max-w-3xl relative">
                    <pre class="rounded-lg">
                    <code class="language-html rounded-lg">{{ $component->tailwind_code }}</code>
                </pre>
                    <input type="hidden" id="codeToCopy" value="{{ $component->tailwind_code }}">

                    <x-mary-button id="copyIcon"
                        class="copy-button btn-ghost btn-sm absolute top-[2.1rem] right-[0.5rem]"
                        data-clipboard-target="#codeToCopy">
                        <x-heroicon-o-clipboard class="w-4 h-4" />
                    </x-mary-button>

                    <x-mary-button id="checkIcon" class="btn-ghost btn-sm absolute top-[2.1rem] right-[0.5rem] hidden">
                        <x-heroicon-o-check class="w-4 h-4" />
                    </x-mary-button>
                </div>
            </div>
        </div>
    </main>

    <aside class="w-96 p-4 px-16 fixed h-full overflow-y-auto hover:overflow-y-scroll mt-20 right-0 hidden xl:block">
        <h2 class="font-bold mb-3">On This Page</h2>
        <div class="flex flex-col gap-2 text-sm text-muted-color cursor-pointer">
            <a href="#title-section" class="hover:text-primary-white transition-all">{{ $component->name }}</a>
            <a href="#preview-section" class="hover:text-primary-white transition-all">Preview</a>
            <a href="#code-section" class="hover:text-primary-white transition-all">Code</a>
        </div>
    </aside>
</div>
