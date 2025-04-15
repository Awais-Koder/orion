<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    @include('partials.head')
</head>

<body class="bg-white">
    
    <flux:main>
        {{ $slot }}
    </flux:main>
    @fluxScripts
</body>

</html>
