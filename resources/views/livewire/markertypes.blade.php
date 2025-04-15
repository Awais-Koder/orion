<div class="rounded-xl p-8 w-full max-w-6xl mx-auto shadow-md min-h-[450px] transition-all duration-300 bg-white">
    {{-- Header --}}
    <h2 class="text-black text-2xl text-center mb-4 font-bold">Select A Marker Type</h2>
    {{-- Market Type Buttons --}}
    <div class="flex flex-wrap gap-4">
        @foreach ($markerTypes as $markerType)
        <flux:button icon:trailing="chevron-down" class="shadow-sm cursor-pointer"
            variant="{{ $selectedMarkerTypeId === $markerType->id ? 'outline' : 'primary' }}"
            wire:click="selectMarkerType({{ $markerType->id }})">
            {{ $markerType->name }}
        </flux:button>
        @endforeach
    </div>

    {{-- Categories for Selected Marker Type --}}
    @if ($selectedMarkerTypeId)
    @php
    $selectedMarkerType = $markerTypes->firstWhere('id', $selectedMarkerTypeId);
    @endphp

    <div x-data="{ show: true }" x-show="show" x-transition:enter="transition ease-out duration-500"
        x-transition:enter-start="opacity-0 translate-y-3" x-transition:enter-end="opacity-100 translate-y-0"
        class="mt-6">
        <h2 class="text-lg font-semibold text-black">Select a Category</h2>
        <div class="flex flex-wrap gap-3 mt-2">
            @foreach ($selectedMarkerType->markerTypeCategories as $category)
            <flux:button class="shadow-sm cursor-pointer" variant="{{ $selectedCategoryId === $category->id ? 'outline' : 'primary' }}"
                wire:click="selectCategory({{ $category->id }})">
                {{ $category->name }}
            </flux:button>
            @endforeach
        </div>
    </div>
    @endif
</div>
