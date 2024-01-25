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

    <nav class="text-lg font-medium flex justify-between mb-7 items-center">
        <ul class="flex space-x-8 items-center">
            <li><a href="{{ route('jobs.index') }}">Home</a></li>
        </ul>

        <ul class="flex space-x-8 items-center">
            @auth
                <li>
                    <a href="{{ route('my-job-applications.index') }}">
                        {{ auth()->user()->name ?? 'Anynomus' }}
                    </a>
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="border border-slate-200 rounded-md font-semibold text-black px-4 py-2 hover:bg-slate-200">
                            Logout
                        </button>
                    </form>
                </li>
            @else
                <li>
                    <x-link-button :href="route('login')">Login</x-link-button>
                </li>
            @endauth
        </ul>
    </nav>

    @if (session('success'))
        <div class="my-4 rounded-md bg-green-200 border-green-500 px-5 py-3">
            <h3 class="font-semibold text-green-800">Success!</h3>
            <p class="text-sm text-green-600">{{ session('success') }}</p>
        </div>
    @elseif (session('error'))
        <div class="my-4 rounded-md bg-red-200 border-red-500 px-5 py-3">
            <h3 class="font-semibold text-red-800">Sorry!</h3>
            <p class="text-sm text-red-600">{{ session('error') }}</p>
        </div>
    @endif

    {{ $slot }}
</body>

</html>
