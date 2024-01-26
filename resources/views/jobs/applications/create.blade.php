<x-layout>
    <x-breadcrumbs class="mb-4" :links="[
        'Jobs' => route('jobs.index'),
        $job->title => route('jobs.show', ['job' => $job]),
        'Application' => '#',
    ]" />

    <x-job-card :$job />

    <x-card class="mt-5">
        <div class="mb-5">
            <h4 class="text-lg font-medium">Job Application Form</h4>
        </div>

        <form method="post" action="{{ route('jobs.applications.store', ['job' => $job]) }}"
            enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col gap-y-2 mb-5">
                <label for="expected_salary">Upload Your CV</label>
                <x-text-input type="file" name="cv" />
            </div>
            <div class="flex flex-col gap-y-2 mb-5">
                <label for="expected_salary">Expected Salary</label>
                <x-text-input type="number" name="expected_salary" />
            </div>

            <div>
                <button type="submit" class="w-full rounded-md bg-slate-700 text-white px-2 py-1">
                    Apply
                </button>
            </div>
        </form>
    </x-card>
</x-layout>
