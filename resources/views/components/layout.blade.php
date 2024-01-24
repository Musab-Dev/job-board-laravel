<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel Job Board</title>

    @vite('resources/css/app.css')

</head>

<body
    class="bg-gradient-to-r from-indigo-100 from-10% via-sky-100 via-30% to-emerald-100 to-90% text-slate-700 mx-auto my-20 max-w-2xl">

    <div class="absolute top-10 right-10">
        @if (auth()->user())
            <p>Hello, {{ auth()->user()->name }}</p>
        @else
            <a href="{{ route('login') }}">Login</a>
        @endif
    </div>

    {{ $slot }}
</body>

</html>
