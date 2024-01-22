<x-card class="mb-2">
    <div class="flex justify-between items-center">
        <div class="text-lg font-medium">{{ $job->title }}</div>
        <div class="text-slate-500 text-sm">${{ number_format($job->salary) }}</div>
    </div>

    <div class="my-4 flex justify-between items-center text-sm text-slate-500">
        <div class="flex items-center space-x-3">
            <h2>Company Name</h2>
            <p>{{ $job->location }}</p>
        </div>
        <div class="flex items-center space-x-2">
            <x-tag>{{ $job->experience }}</x-tag>
            <x-tag>{{ $job->category }}</x-tag>
        </div>
    </div>

    <div class="text-sm text-slate-500 text-justify mb-4">
        {!! nl2br(e($job->description)) !!}
    </div>

    {{ $slot }}
</x-card>
