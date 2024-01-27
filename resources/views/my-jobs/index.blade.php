<x-layout>
    @forelse ($jobs as $job)
        <x-job-card :$job>
            <div class="flex justify-between items-end">
                <div class="flex flex-col space-y-3 text-sm text-slate-500">
                    <div>
                        <span class="font-medium">
                            You posted this job {{ $job->created_at->diffForHumans() }}
                        </span>
                    </div>
                    <div>
                        <span class="font-medium">
                            there are {{ $job->applicants->count() }}
                            {{ Str::plural('applicant', $job->applicants->count()) }}
                            for this job
                        </span>
                    </div>
                    {{-- <div>
                        <span class="font-medium">Average Asking Salary: </span>
                        ${{ number_format($application->job->applicants_avg_expected_salary) }}
                    </div> --}}
                </div>
                <div>
                    <form method="post" action="{{ route('my-jobs.destroy', ['my_job' => $job]) }}">
                        @csrf
                        @method('delete')
                        <button type="submit" class="mt-6 rounded-md bg-slate-700 text-white px-2 py-1">
                            Delete Job
                        </button>
                    </form>
                </div>
            </div>


        </x-job-card>
    @empty
        <x-card class="py-10 mt-10">
            <h5 class="text-center">
                you did not post any jobs yet.
                <a href="{{ route('jobs.index') }}" class="font-medium text-indigo-500 hover:underline">
                    add job oppertunity
                </a>
            </h5>
        </x-card>
    @endforelse
</x-layout>
