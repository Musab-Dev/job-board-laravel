<x-layout>
    <x-card class="py-8 px-28">

        <h1 class="text-2xl text-center font-semibold mb-2">Login</h1>
        <p class="text-center text-slate-500 mb-3">Welcome Back! sign in again to get access to new job opportunities</p>

        <form method="POST" action="{{ route('login.post') }}">
            @csrf
            <div class="mb-4 grid grid-cols-1 gap-y-2">
                <x-label for="email" :required="true">Email</x-label>
                <x-text-input type="email" name="email" id="email" placeholder="someone@example.com" required />
            </div>
            <div class="mb-4 grid grid-cols-1 gap-y-2">
                <x-label for="password" :required="true">Password</x-label>
                <x-text-input type="password" name="password" id="password" required />

                @if (session('error'))
                    <p class="text-red-600 text-sm">{{ session('error') }}</p>
                @endif
            </div>

            <div class="flex justify-between text-sm my-6">
                <div class="flex items-center space-x-2">
                    <input type="checkbox" name="remember" id="remember" class="rounded-md border border-slate-200" />
                    <label class="text-slate-500" for="remember">Remember me</label>
                </div>
                <div>
                    <p>
                        <span class="text-slate-500">Forgot your password?</span>
                        <a href="#" class="hover:underline">Reset here!</a>
                    </p>
                </div>
            </div>

            <div>
                <button type="submit" class="w-full rounded-md bg-slate-700 text-white px-2 py-1">
                    Login
                </button>
            </div>
        </form>
    </x-card>
</x-layout>
