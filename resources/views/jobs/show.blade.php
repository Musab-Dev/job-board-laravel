<x-layout>
    <x-breadcrumbs :links="['Jobs' => route('jobs.index'), $job->title => '#']" />
    <x-job-card :job="$job" />
</x-layout>
