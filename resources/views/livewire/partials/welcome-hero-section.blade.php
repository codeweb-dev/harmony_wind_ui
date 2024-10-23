<?php
use App\Models\User;
use Livewire\Volt\Component;
use Livewire\Attributes\Layout;

new #[Layout('layouts.app')] class extends Component {
    public int $userCount = 0;

    /**
     * Fetch the user count on mount.
     */
    public function mount(): void
    {
        $this->userCount = User::count(); // Get the total number of users
    }

    /**
     * Render the component view with the user count.
     */
    public function render(): mixed
    {
        return view('livewire.partials.welcome-hero-section', [
            'userCount' => $this->userCount,
        ]);
    }
};
?>

<div class="min-h-screen w-full flex flex-col items-center justify-center relative">
    <div class="flex justify-center mb-6">
        <div class="rounded-full border border-border-color px-3 py-1 text-sm text-muted-color bg-transparent">
            Trusted by {{ number_format($userCount) }}+ people
        </div>
    </div>

    <div class="text-center">
        <h1 class="text-3xl font-bold text-primary-white md:text-4xl lg:text-5xl">
            Your
            <span class="bg-gradient-to-b from-emerald-500 to-emerald-900 bg-clip-text text-transparent">
                Harmony
            </span>
            Wind UI (Beta)
        </h1>

        <p class="mt-6 text-muted-color w-9/12 mx-auto">
            Beautifully designed components you can copy and paste directly into your apps.
        </p>

        <div class="mt-10 flex items-center justify-center gap-x-6">
            <x-mary-button label="Get Started" link="/login" icon-right="o-chevron-right"
                class="bg-primary-white text-black" />

            <a href="https://www.facebook.com/allen.labrague.75" target="_blank">
                <x-mary-button label="Facebook" class="btn-ghost" />
            </a>
        </div>
    </div>
</div>
