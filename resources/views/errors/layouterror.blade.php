<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error Page</title>
    <!-- Tambahkan file CSS Tailwind atau CDN di sini -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @vite('resources/css/app.css')
</head>

<body class="bg-covererror">
    <div class="flex items-center">
        <div class="flex-1 ml-115">
            @yield('content')
        </div>
        <img class=" w-115" src="{{ url('images/illustration/error.png') }}" alt="error" />
        @vite('resources/js/app.js')
</body>

</html>
