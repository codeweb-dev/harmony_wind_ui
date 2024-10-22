<div class="min-h-screen w-full flex flex-col items-center py-8 bg-custom-background mt-10">
    <div class="w-full max-w-3xl bg-custom-background p-6 text-primary-white mt-14">
        <div class="mb-24">
            <h1 class="text-5xl font-bold text-primary-white mb-3 text-center"><span
                    class="bg-gradient-to-b from-emerald-500 to-emerald-900 bg-clip-text text-transparent">
                    Harmony
                </span> Wind UI Blog</h1>
            <p class="text-muted-color text-center">What's new around here?</p>
        </div>
        @foreach ($blogs as $blog)
            <div class="border-t border-border-color pt-12 mt-12">
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-primary-white hover:underline">
                        <a href="{{ route('show.blog', $blog->id) }}" wire:navigate>{{ $blog->name }}</a>
                    </h2>
                    <div class="text-sm text-muted-color mt-1 flex items-center gap-3">
                        <p>
                            {{ \Carbon\Carbon::parse($blog->created_at)->format('F j, Y') }}
                        </p>
                        <dd class="font-bold text-2xl">⋅</dd>
                        <p>
                            {{ $blog->views }} Views
                        </p>
                        <dd class="font-bold text-2xl">⋅</dd>
                        <div class="flex items-center gap-1">
                            <x-heroicon-c-hand-thumb-up class="w-4" />
                            <p>{{ $blog->likes }}</p>
                        </div>
                        <div class="flex items-center gap-1">
                            <x-heroicon-c-hand-thumb-down class="w-4" />
                            <p>{{ $blog->dislikes }}</p>
                        </div>
                    </div>
                </div>
                <div class="text-muted-color leading-relaxed blog-h3">
                    {!! $blog->description !!}
                </div>
            </div>
        @endforeach
    </div>
</div>
