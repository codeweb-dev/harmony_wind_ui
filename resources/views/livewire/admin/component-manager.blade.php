<div class="min-h-screen w-full flex flex-col items-center justify-center py-8 bg-custom-background mt-10">
    <div class="w-full max-w-3xl bg-custom-background p-6 text-primary-white">
        @if (!$componentId)
            <h1 class="text-2xl font-semibold mb-6 text-center">Manage UI Components</h1>

            <form wire:submit.prevent="create" class="space-y-6">
                <div>
                    <label for="name" class="block text-sm font-medium leading-6">Component name</label>
                    <div class="mt-1">
                        <x-mary-input wire:model="name" type="text"
                            class="block w-full rounded-md bg-transparent border-0 py-1.5 ring-1 ring-inset ring-border-color placeholder:text-muted-color focus:ring-2 focus:ring-inset focus:ring-white sm:leading-6" />
                    </div>
                </div>

                <div>
                    <label for="url_name" class="block text-sm font-medium leading-6">Component url name</label>
                    <div class="mt-1">
                        <x-mary-input wire:model="url_name" type="text"
                            class="block w-full rounded-md bg-transparent border-0 py-1.5 ring-1 ring-inset ring-border-color placeholder:text-muted-color focus:ring-2 focus:ring-inset focus:ring-white sm:leading-6" />
                    </div>
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium leading-6">Description</label>
                    <div class="mt-1">
                        <x-mary-textarea wire:model="description" rows="4" inline
                            class="block w-full rounded-md bg-transparent border-0 py-1.5 ring-1 ring-inset ring-border-color placeholder:text-muted-color focus:ring-2 focus:ring-inset focus:ring-white sm:leading-6" />
                    </div>
                </div>

                <div>
                    <label for="tailwind_code" class="block text-sm font-medium leading-6">Tailwind Code</label>
                    <div class="mt-1">
                        <x-mary-textarea wire:model="tailwind_code" rows="4" inline
                            class="block w-full rounded-md bg-transparent border-0 py-1.5 ring-1 ring-inset ring-border-color placeholder:text-muted-color focus:ring-2 focus:ring-inset focus:ring-white sm:leading-6" />
                    </div>
                </div>

                <div class="flex items-center justify-center">
                    <x-mary-button label="Create component" type="submit" class="bg-primary-white text-black"
                        spinner="create" />
                </div>
            </form>
        @endif

        @if ($componentId)
            <h1 class="text-2xl font-semibold mb-6 text-center">Edit components</h1>
            <form wire:submit.prevent="update" class="space-y-6 mt-4">
                <div>
                    <label for="name" class="block text-sm font-medium leading-6">Component name</label>
                    <div class="mt-1">
                        <x-mary-input wire:model="name" type="text"
                            class="block w-full rounded-md bg-transparent border-0 py-1.5 ring-1 ring-inset ring-border-color placeholder:text-muted-color focus:ring-2 focus:ring-inset focus:ring-white sm:leading-6" />
                    </div>
                </div>

                <div>
                    <label for="url_name" class="block text-sm font-medium leading-6">Component url name</label>
                    <div class="mt-1">
                        <x-mary-input wire:model="url_name" type="text"
                            class="block w-full rounded-md bg-transparent border-0 py-1.5 ring-1 ring-inset ring-border-color placeholder:text-muted-color focus:ring-2 focus:ring-inset focus:ring-white sm:leading-6" />
                    </div>
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium leading-6">Description</label>
                    <div class="mt-1">
                        <x-mary-textarea wire:model="description" rows="4" inline
                            class="block w-full rounded-md bg-transparent border-0 py-1.5 ring-1 ring-inset ring-border-color placeholder:text-muted-color focus:ring-2 focus:ring-inset focus:ring-white sm:leading-6" />
                    </div>
                </div>

                <div>
                    <label for="tailwind_code" class="block text-sm font-medium leading-6">Tailwind Code</label>
                    <div class="mt-1">
                        <x-mary-textarea wire:model="tailwind_code" rows="4" inline
                            class="block w-full rounded-md bg-transparent border-0 py-1.5 ring-1 ring-inset ring-border-color placeholder:text-muted-color focus:ring-2 focus:ring-inset focus:ring-white sm:leading-6" />
                    </div>
                </div>

                <div class="flex items-center justify-center">
                    <x-mary-button label="Update component" type="submit" class="bg-primary-white text-black"
                        spinner="update" />
                </div>
            </form>
        @endif

        <hr class="my-12 border-border-color">

        <x-mary-table :headers="$headers" :rows="$components">
            @scope('actions', $component)
                <div class="flex items-center gap-3">
                    <button wire:click="delete({{ $component->id }})">Delete</button>
                    <button wire:click="edit({{ $component->id }})">Edit</button>
                </div>
            @endscope
        </x-mary-table>
    </div>
</div>
