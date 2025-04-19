<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title>{{ $title ?? 'Laravel' }}</title>

<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/nouislider@15.7.0/dist/nouislider.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/nouislider@15.7.0/dist/nouislider.min.js"></script>


@vite(['resources/css/app.css', 'resources/js/app.js'])
@fluxAppearance
