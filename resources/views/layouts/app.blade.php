<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>@yield('title')</title>
</head>
<body class="grid grid-rows-[10%_80%_10%] min-h-screen">
    <header class="bg-gray-400 p-5 grid place-items-center">
        @yield('header')
    </header>
    <main class="flex justify-center items-center flex-col">
        @yield('content')
    </main>
    <footer class="bg-gray-400">
        @yield('footer')
    </footer>
</body>
</html>
