<x-layout>
    <x-breadcrumbs class="mb-4" :links="['Jobs' => route('jobs.index'), $job->title => '#']" />
    <x-job-card :job="$job">
        <div class="text-sm text-slate-500 text-justify mb-4">
            {!! nl2br(e($job->description)) !!}
        </div>

        {{-- @if (auth()->user()->isAppliedToJob($job)) --}}
        {{-- using autherization policy (similar to the previous if statement) --}}
        @can('apply', $job)
            <x-link-button :href="route('jobs.applications.create', ['job' => $job])">
                Apply
            </x-link-button>
        @else
            <p class="font-medium text-slate-500 text-center">You Already Applied to this Job</p>
        @endcan

    </x-job-card>

    <h2 class="text-3xl font-semibold my-6">Jobs with Same Employer</h2>

    @forelse ($companyOtherJobs as $job)
        <x-job-card :job="$job">
            <x-link-button :href="route('jobs.show', $job)">
                View Job
            </x-link-button>
        </x-job-card>
    @empty
        <p>No jobs found</p>
    @endforelse

</x-layout>
