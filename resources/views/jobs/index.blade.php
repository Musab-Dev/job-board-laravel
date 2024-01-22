<x-layout>
    @foreach ($jobs as $job)
        <x-job-card :job="$job">
            <x-link-button :href="route('jobs.show', $job)">
                View Job
            </x-link-button>
        </x-job-card>
    @endforeach
</x-layout>
