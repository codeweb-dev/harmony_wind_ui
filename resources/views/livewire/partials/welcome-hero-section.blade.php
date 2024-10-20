<div class="min-h-screen w-full flex flex-col items-center justify-center relative">
    <div class="flex justify-center mb-6">
        <div class="rounded-full border border-border-color px-3 py-1 text-sm text-muted-color bg-transparent">
            Trusted by 35,000+ people</a>
        </div>
    </div>

    <div class="text-center">
        <h1 class="text-3xl font-bold text-primary-white md:text-4xl lg:text-5xl">
            Your
            <span class="bg-gradient-to-b from-emerald-500 to-emerald-900 bg-clip-text text-transparent">
                Harmony
            </span>
            Wind UI
        </h1>

        <p class="mt-6 text-muted-color w-9/12 mx-auto">
            Beautifully designed components you can copy and paste directly into your apps.
        </p>

        <div class="mt-10 flex items-center justify-center gap-x-6">
            <a href="{{ route('login') }}" wire:navigate>
                <x-mary-button label="Get Started" icon-right="o-chevron-right" class="bg-primary-white text-black" />
            </a>
            <a href="{{ route('login') }}" wire:navigate>
                <x-mary-button label="Facebook" class="btn-ghost" />
            </a>
        </div>
    </div>
</div>
