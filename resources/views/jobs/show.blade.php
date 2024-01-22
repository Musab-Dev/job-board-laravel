<x-layout>
    <x-breadcrumbs class="mb-4" :links="['Jobs' => route('jobs.index'), $job->title => '#']" />
    <x-job-card :job="$job">
        <div class="text-sm text-slate-500 text-justify mb-4">
            {!! nl2br(e($job->description)) !!}
        </div>
    </x-job-card>
</x-layout>
