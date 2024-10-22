<div class="min-h-screen w-full flex flex-col items-center justify-center py-8 bg-custom-background mt-10">
    <div class="w-full max-w-3xl bg-custom-background p-6 text-primary-white">
        @if (!$blogId)
            <h1 class="text-2xl font-semibold mb-6 text-center">Manage Blog</h1>

            <form wire:submit.prevent="create" class="space-y-6">
                <div>
                    <label for="name" class="block text-sm font-medium leading-6">Blog name</label>
                    <div class="mt-1">
                        <x-mary-input wire:model="name" type="text"
                            class="block w-full rounded-md bg-transparent border-0 py-1.5 ring-1 ring-inset ring-border-color placeholder:text-muted-color focus:ring-2 focus:ring-inset focus:ring-white sm:leading-6" />
                    </div>
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium leading-6">Description</label>
                    <div class="mt-1">
                        <x-mary-editor wire:model="description" />
                    </div>
                </div>

                <div class="flex items-center justify-center">
                    <x-mary-button label="Create blog" type="submit" class="bg-primary-white text-black"
                        spinner="create" />
                </div>
            </form>
        @endif

        @if ($blogId)
            <h1 class="text-2xl font-semibold mb-6 text-center">Edit blog</h1>
            <form wire:submit.prevent="update" class="space-y-6 mt-4">
                <div>
                    <label for="name" class="block text-sm font-medium leading-6">Blog name</label>
                    <div class="mt-1">
                        <x-mary-input wire:model="name" type="text"
                            class="block w-full rounded-md bg-transparent border-0 py-1.5 ring-1 ring-inset ring-border-color placeholder:text-muted-color focus:ring-2 focus:ring-inset focus:ring-white sm:leading-6" />
                    </div>
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium leading-6">Description</label>
                    <div class="mt-1">
                        <x-mary-editor wire:model="description" />
                    </div>
                </div>

                <div class="flex items-center justify-center">
                    <x-mary-button label="Update blog" type="submit" class="bg-primary-white text-black"
                        spinner="update" />
                </div>
            </form>
        @endif

        <hr class="my-12 border-border-color">

        <x-mary-table :headers="$headers" :rows="$blogs">
            @scope('actions', $blog)
                <div class="flex items-center gap-3">
                    <button wire:click="delete({{ $blog->id }})">Delete</button>
                    <button wire:click="edit({{ $blog->id }})">Edit</button>
                </div>
            @endscope
        </x-mary-table>
    </div>
</div>
