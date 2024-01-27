<x-layout>
    <x-breadcrumbs class="mb-4" :links="['My Jobs' => '#']" />
    @forelse ($jobs as $job)
        <x-job-card :$job>
            <div class="text-sm text-slate-500 text-justify mb-4">
                {!! nl2br(e($job->description)) !!}
            </div>
            <div>You posted this job {{ $job->created_at->diffForHumans() }}</div>
            <div class="mt-4">
                <h6 class="font-semibold mb-2">Applicants</h6>

                @forelse ($job->applicants as $application)
                    <div class="p-3 rounded-md bg-slate-100 mb-3">
                        <div class="flex justify-between items-center">
                            <div class="space-y-0">
                                <div class="font-medium">{{ $application->applicant->name }}</div>
                                <div class="text-sm text-slate-500">
                                    Applied {{ $application->created_at->diffForHumans() }}
                                </div>
                                <div class="text-sm font-medium text-purple-600 hover:underline">
                                    Download Applicant CV
                                </div>
                            </div>
                            <div class="border border-dashed border-slate-300 rounded-md p-2">
                                ${{ number_format($application->expected_salary) }}
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="border border-slate-300 border-dashed rounded-md">
                        <div class="text-center text-indigo-400 p-4">No Applicants Yet!</div>
                    </div>
                @endforelse
                <div class="grid grid-cols-2 gap-2 mt-4">
                    <a class="w-full mt-4 bg-slate-700 p-2 text-white text-center rounded-md"
                        href="{{ route('my-jobs.edit', $job) }}">
                        Edit Job
                    </a>

                    <form action="{{ route('my-jobs.destroy', $job) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="w-full mt-4 bg-red-600 p-2 text-white text-center rounded-md">Delete Job</button>
                    </form>
                </div>
            </div>
        </x-job-card>
    @empty
        <x-card class="py-10 mt-10">
            <h5 class="text-center">
                you did not post any jobs yet.
                <a href="{{ route('my-jobs.create') }}" class="font-medium text-indigo-500 hover:underline">
                    add job oppertunity
                </a>
            </h5>
        </x-card>
    @endforelse
</x-layout>
