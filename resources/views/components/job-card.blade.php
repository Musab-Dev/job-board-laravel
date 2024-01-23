<x-card class="mb-2">
    <div class="flex justify-between items-center">
        <div class="text-lg font-medium">{{ $job->title }}</div>
        <div class="text-slate-500 text-sm">${{ number_format($job->salary) }}</div>
    </div>

    <div class="my-4 flex justify-between items-center text-sm text-slate-500">
        <div class="flex items-center space-x-3">
            <h2>{{ $job->company->name }}</h2>
            <p>{{ $job->location }}</p>
        </div>
        <div class="flex items-center space-x-2">
            <x-tag>
                <a
                    href="{{ route('jobs.index', ['search' => request('search'), 'min_salary' => request('min_salary'), 'max_salary' => request('max_salary'), 'experience' => $job->experience, 'category' => request('category')]) }}">
                    {{ Str::ucfirst($job->experience) }}
                </a>
            </x-tag>
            <x-tag>
                <a
                    href="{{ route('jobs.index', ['search' => request('search'), 'min_salary' => request('min_salary'), 'max_salary' => request('max_salary'), 'experience' => request('experience'), 'category' => $job->category]) }}">
                    {{ Str::ucfirst($job->category) }}
                </a>
            </x-tag>
        </div>
    </div>

    {{ $slot }}
</x-card>
