<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials.head')
    <style>
        .scrollbar-hide {
            scrollbar-width: none;
            /* Firefox */
        }

        .scrollbar-hide::-webkit-scrollbar {
            display: none;
            /* Chrome, Safari */
        }
    </style>
</head>

<body class="bg-[#F5F7FA] flex items-center lg:justify-center min-h-screen flex-col">
    <header class="bg-black text-white py-2 flex justify-between items-center w-full">
        <a href="{{ route('home') }}"
            class="inline-block px-5 py-1.5 text-black border border-transparent rounded-sm text-xl leading-normal text-white"
            wire:navigate>Orion</a>
        @auth
        <div class="flex items-center space-x-4">
            <select class="bg-gray-700 text-white p-1 rounded">
                <option>EN</option>
                <option>Other</option>
            </select>
            <a href="{{route('dashboard')}}" class="bg-gray-700 p-2 rounded" wire:navigate>
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
            </a>
            <button class="bg-gray-700 p-2 rounded">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                    </path>
                </svg>
            </button>
        </div>
        @else
        <div>
            <a href="{{ route('login') }}"
                class="inline-block px-5 py-1.5 text-black border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal text-white"
                wire:navigate>
                Log in
            </a>

            <a href="{{ route('register') }}"
                class="inline-block px-5 py-1.5 border-[#19140035] hover:border-[#1915014a] border text-black dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal text-white"
                wire:navigate>
                Register
            </a>
        </div>
        @endauth
    </header>
    <div class="lg:grow w-full">
        {{$slot}}
    </div>
</body>
<script>
    const slider = document.getElementById('rangeSlider');
  
    noUiSlider.create(slider, {
      start: [200, 800],
      connect: true,
      step: 10,
      range: {
        min: 0,
        max: 1000
      }
    });
  
    const minVal = document.getElementById('min-val');
    const maxVal = document.getElementById('max-val');
  
    slider.noUiSlider.on('update', function (values) {
      minVal.textContent = Math.round(values[0]);
      maxVal.textContent = Math.round(values[1]);
    });
</script>


</html>