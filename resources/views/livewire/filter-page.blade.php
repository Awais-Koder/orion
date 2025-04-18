<div class="min-h-screen bg-gray-100 text-black">
    <!-- Main Content -->
    <div class="flex">
        <!-- Sidebar with Filters -->
        <aside class="w-96 bg-white py-4 shadow-md min-h-[100vh] border-r overflow-y-auto scrollbar-hide">
            <!-- Search -->
            <div class="mb-4 m-2">
                <input type="text" placeholder="Search" class="w-full p-2 border rounded">
            </div>

            <!-- Sort By -->
            <div class="mb-4 m-2">
                <label class="block text-sm font-medium text-gray-700">Sort by</label>
                <select class="w-full p-2 border rounded">
                    <option>Thickness / descending</option>
                    <option>Thickness / ascending</option>
                </select>
            </div>
            <!-- Brands Filter -->
            <div class="w-full border-b"></div>
            <div class="mb-4 m-4">
                <label class="block text-sm font-medium text-gray-700">Brands</label>
                <div class="space-y-2">
                    <div class="flex items-center mb-2">
                        <input type="checkbox" class="mr-2">
                        <label class="cursor-pointer">Show all ({{ $brands->count() }})</label>
                    </div>

                    @forelse ($this->visibleBrands as $brand)
                    <div class="flex items-center cursor-pointer mb-1">
                        <input type="checkbox" wire:model="selectedBrands" value="{{ $brand->id }}" class="mr-2">
                        <label>{{ $brand->name }} ({{ $brand->products_count ?? 0 }})</label>
                    </div>
                    @empty
                    <small>Not Found.</small>
                    @endforelse
                    <!-- Add more brands as needed -->
                </div>
            </div>

            <!-- Fire Resistance Filter -->
            {{-- @for ($i = 0; $i < 5; $i++)
            <div class="w-full border-b"></div>
            <div class="mb-4 m-4">
                <label class="block text-sm font-medium text-gray-700">Fire resistance</label>
                <div class="space-y-2">
                    <div class="flex items-center">
                        <input type="checkbox" wire:model="fireResistance" value="all" class="mr-2">
                        <label>Show all (54)</label>
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" wire:model="fireResistance" value="0" class="mr-2">
                        <label>0 (12)</label>
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" wire:model="fireResistance" value="30" class="mr-2">
                        <label>30 (8)</label>
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" wire:model="fireResistance" value="30" class="mr-2">
                        <label>30 (8)</label>
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" wire:model="fireResistance" value="30" class="mr-2">
                        <label>30 (8)</label>
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" wire:model="fireResistance" value="30" class="mr-2">
                        <label>30 (8)</label>
                    </div>
                    <!-- Add more fire resistance options as needed -->
                </div>
            </div>
            @endfor --}}
            @foreach($filteredData as $group)
            <div class="w-full border-b"></div>
                <div class="mb-4 m-4">
                    <h3>{{ $group->name }}</h3>
                    @foreach($group->properties as $property)
                        @include('partials.property-filter', ['property' => $property])
                    @endforeach
                </div>
            @endforeach
            <div class="mb-4 m-4">
                <button class="text-orange-500">Show more</button>
            </div>
            <!-- Wall Height Slider -->
            {{-- <div class="w-full border-b"></div>
            <div class="mb-4 m-4">
                <label class="block text-sm font-medium text-gray-700">Wall height (mm)</label>
                <div class="flex justify-between">
                    <span>{{ $wallHeight[0] }}</span>
                    <span>{{ $wallHeight[1] }}</span>
                </div>
            </div>
            <div class="m-4">
                <input type="range" min="1500" max="2400" wire:model="wallHeight" class="w-full">
            </div> --}}
        </aside>

        <!-- Main Content Area -->
        <main class="flex-1 bg-white max-h-[100vh] border-r overflow-y-auto scrollbar-hide">
            {{-- breadcrumbs --}}
            <div class="flex justify-between items-center border-b">
                <div class="flex items-center space-x-2 text-gray-600 p-2">
                    <!-- Home Icon -->
                    <a href="{{route('home')}}" class="text-gray-400 hover:text-gray-600" wire:navigate>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9.75L12 3l9 6.75V21a1.5 1.5 0 01-1.5 1.5h-15A1.5 1.5 0 013 21V9.75z"/>
                          </svg>
                    </a>
                
                    <!-- Chevron Separator -->
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                
                    <!-- Projects Link -->
                    <a href="{{route('marker.types')}}" class="text-gray-600 hover:text-gray-800" wire:navigate>{{ $this->markerType?->name ?? 'MarkerType' }}</a>
                
                    <!-- Chevron Separator -->
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                
                    <!-- Current Page (Project Nero) -->
                    <span class="text-gray-600 font-medium">{{ $this->category?->name ?? 'category' }}</span>
                </div>
            </div>
            <!-- Filter Tags and Reset -->
            <div class="flex justify-between items-center mb-4 border-b py-4">
                <div class="">
                    <span class="font-bold px-3 py-1 rounded"> results</span>
                    <span class="text-gray-500 border px-3 py-1 mr-1 ">Fire resistance <button
                        wire:click="resetFilter('fireResistance')" class="cursor-pointer ml-1 font-bold">x</button>
                    </span>
                <span wire:click="resetAll" class="text-gray-500 border px-3 py-1 cursor-pointer">Reset</span>
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
                        <p class="text-sm text-gray-600">Diameter/dimension: {{ $solution['diameter'] }}</p>
                        <p class="text-sm text-gray-600">Fire resistance: {{ $solution['fire_resistance'] }}</p>
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

