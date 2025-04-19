<div class="min-h-screen bg-gray-100 text-black">
    <!-- Main Content -->
    <div class="flex">
        <!-- Sidebar with Filters -->
        <aside class="w-96 bg-white py-4 shadow-md max-h-[100vh] border-r overflow-y-auto scrollbar-hide ">
            <!-- Search -->
            <div class="mb-4 m-2">
                <input type="text" placeholder="Search" class="w-full p-2 border rounded">
            </div>
            <!-- Brands Filter -->
            <div class="w-full border-b"></div>
            <div class="mb-4 m-4">
                <label class="block text-sm font-medium text-gray-700 my-2">Brands</label>
                <div class="space-y-2">
                    @forelse ($this->visibleBrands as $brand)
                    <div class="flex items-center cursor-pointer mb-1">
                        <input type="checkbox" value="{{ $brand->id }}"
                            class="w-4 h-4 text-blue-600 border-gray-300 bg-white">
                        <label class="ms-2 text-sm font-medium text-gray-900">{{ $brand->name }}</label>
                    </div>
                    @empty
                    <small>Not Found.</small>
                    @endforelse

                    @if ($brands->count() > $visibleBrandCount)
                    <div class="mt-2">
                        <button wire:click="showMoreBrands" class="text-gray-500 cursor-pointer hover:underline hover:text-gray-800">
                            Show more
                        </button>
                    </div>
                    @endif
                </div>
            </div>



            @foreach($filteredData as $group)
            <div class="w-full border-b"></div>
            <div class="mb-4">
                {{-- <h3>{{ $group->name }}</h3> --}}
                @foreach($group->properties as $property)
                <div class="w-full border-b"></div>
                {{-- including the partial blade file to include the proepretis here --}}
                @include('partials.property-filter', ['property' => $property])
                @endforeach
            </div>
            @endforeach
        </aside>

        <!-- Main Content Area -->
        <main class="flex-1 bg-white min-h-[100vh] border-r overflow-y-auto scrollbar-hide">
            {{-- breadcrumbs --}}
            <div class="flex justify-between items-center border-b">
                <div class="flex items-center space-x-2 text-gray-600 p-2">
                    <!-- Home Icon -->
                    <a href="{{route('home')}}" class="text-gray-400 hover:text-gray-600" wire:navigate>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 9.75L12 3l9 6.75V21a1.5 1.5 0 01-1.5 1.5h-15A1.5 1.5 0 013 21V9.75z" />
                        </svg>
                    </a>

                    <!-- Chevron Separator -->
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>

                    <!-- Projects Link -->
                    <a href="{{route('marker.types')}}" class="text-gray-600 hover:text-gray-800" wire:navigate>{{
                        $this->markerType?->name ?? 'MarkerType' }}</a>

                    <!-- Chevron Separator -->
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>

                    <!-- Current Page (Project Nero) -->
                    <span class="text-gray-600 font-medium">{{ $this->category?->name ?? 'category' }}</span>
                </div>
            </div>
            <!-- Filter Tags and Reset -->
            <div class="flex justify-between items-center mb-4 border-b py-4">
                <div class="">
                    <span class="font-bold px-3 py-1 rounded"> results
                    </span>
                    <span class="text-gray-500 border px-3 py-1 mr-1 ">Fire resistance <button
                            wire:click="" class="cursor-pointer ml-1 font-bold">x</button>
                    </span>
                    <span wire:click="" class="text-gray-500 border px-3 py-1 cursor-pointer">Reset</span>
                </div>
            </div>

            <!-- Solutions Grid -->
            <div class="grid grid-cols-3 gap-4">
                @foreach ($filteredData as $group)
                {{-- Access markerType and its solutions --}}
                @if ($group->markerType && $group->markerType->solutions->isNotEmpty())
                @foreach ($group->markerType->solutions as $solution)
                <div class="bg-white p-4 shadow-md rounded hover:shadow-lg transition-shadow">
                    <img src="https://via.placeholder.com/150" alt="{{ $solution['name'] }}"
                        class="w-full h-32 object-cover mb-2">
                    <h3 class="text-lg font-semibold">{{ $solution['name'] }}</h3>
                    <p class="text-sm text-gray-600">Fire resistance: {{ $solution['fire_rating'] }}</p>
                    <button class="mt-2 bg-black text-white px-4 py-2 rounded cursor-pointer">
                        {{ $solution['name'] }} →</button>
                </div>
                @endforeach
                @else
                <div class="col-span-3 text-center p-4">
                    <h2 class="text-xl font-semibold">No results found</h2>
                    <p class="text-gray-500">Try adjusting your filters or search terms.</p>
                </div>
                @endif
                @endforeach
            </div>
        </main>
    </div>
</div>