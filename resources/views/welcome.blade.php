<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Orion</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <!-- fialment / Scripts -->
    @filamentStyles()
    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="">
        <div class="flex flex-col items-center justify-center min-h-screen py-6 sm:py-12 lg:py-24">
            <div class="text-center">
                <h1 class="text-4xl font-bold text-gray-900">Welcome to Orion</h1>
                <p class="mt-4 mb-4 text-lg text-gray-600">Your one-stop solution for all your needs.</p>
                <a href="get-started"
                    class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Get
                    Started</a>
            </div>
        </div>
    </div>
</body>

</html>
