<x-layout>
    <x-breadcrumbs class="mb-4" :links="['My Job Applications' => '#']" />

    @forelse ($applications as $application)
        <x-job-card :job="$application->job">
            <div class="flex justify-between items-end">
                <div class="flex flex-col space-y-3 text-sm text-slate-500">
                    <div>
                        <span class="font-medium">
                            You applied {{ $application->created_at->diffForHumans() }}
                        </span>
                    </div>
                    <div>
                        <span class="font-medium">
                            there are {{ $application->job->applicants_count - 1 }} other
                            {{ Str::plural('applicant', $application->job->applicants_count - 1) }} for this job
                        </span>
                    </div>
                    <div>
                        <span class="font-medium">your asked salary: </span>
                        ${{ number_format($application->expected_salary) }}
                    </div>
                    <div>
                        <span class="font-medium">Average Asking Salary: </span>
                        ${{ number_format($application->job->applicants_avg_expected_salary) }}
                    </div>
                </div>
                <div>
                    <form method="post"
                        action="{{ route('my-job-applications.destroy', ['my_job_application' => $application]) }}">
                        @csrf
                        @method('delete')
                        <button type="submit" class="mt-6 rounded-md bg-slate-700 text-white px-2 py-1">
                            Cancel
                        </button>
                    </form>
                </div>
            </div>


        </x-job-card>
    @empty
        <x-card class="py-10 mt-10">
            <h5 class="text-center">
                you did not apply for any job.
                <a href="{{ route('jobs.index') }}" class="font-medium text-indigo-500 hover:underline">
                    look for job opportunities
                </a>
            </h5>
        </x-card>
    @endforelse
</x-layout>
