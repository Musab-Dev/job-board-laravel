<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel Job Board</title>

    @vite('resources/css/app.css')

</head>

<body
    class="bg-gradient-to-r from-indigo-100 from-10% via-sky-100 via-30% to-emerald-100 to-90% text-slate-700 mx-auto mt-5  max-w-2xl">

    <nav class="text-lg font-medium flex justify-between mb-20">
        <ul class="flex space-x-8">
            <li><a href="{{ route('jobs.index') }}">Home</a></li>
        </ul>

        <ul class="flex space-x-8">
            @auth
                <li>
                    <a href="#">{{ auth()->user()->name }}</a>
                </li>
                <li>
                    <x-link-button :href="route('logout')">Logout</x-link-button>
                </li>
            @else
                <li>
                    <x-link-button :href="route('login')">Login</x-link-button>
                </li>
            @endauth
        </ul>
    </nav>

    {{ $slot }}
</body>

</html>
