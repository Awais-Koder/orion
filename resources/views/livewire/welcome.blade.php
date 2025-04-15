<div>
    <div class="flex flex-col items-center justify-center w-full w-full gap-6 min-h-150">
        <h1 class="text-3xl font-bold text-center text-black">Welcome to Orion</h1>
        <p class="text-sm text-center text-black">Your one-stop solution for all your needs.</p>
        <flux:button :href="route('marker.types')" icon:trailing="arrow-up-right" wire:navigate class="shadow-sm">
            Get Started
        </flux:button>
    </div>
</div>
