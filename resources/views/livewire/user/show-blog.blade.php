<div class="min-h-screen w-full flex flex-col items-center py-8 bg-custom-background mt-10">
    <div class="w-full max-w-3xl bg-custom-background p-6 text-primary-white mt-4">
        <x-mary-button label="Go back" link="/blog" class="btn-ghost mb-4" icon="c-chevron-left" />
        <div class="mb-12">
            <h2 class="text-2xl font-bold text-primary-white">
                {{ $blog->name }}
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

        <div class="flex justify-center mt-12 gap-3">
            <x-mary-button icon="c-hand-thumb-down" label="Dislike" spinner="dislike" wire:click="dislike"
                class="bg-primary-white btn-sm text-black" />

            <x-mary-button icon="c-hand-thumb-up" label="Like" spinner="like" wire:click="like"
                class="bg-primary-white btn-sm text-black" />
        </div>
    </div>
</div>
