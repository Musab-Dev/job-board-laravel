<x-layout>
    <x-breadcrumbs class="mb-4" :links="[
        'My Jobs' => route('my-jobs.index'),
        'Edit Job: ' . $job->title => '#',
    ]" />
    <x-card>
        <h3 class="text-lg font-medium mb-4">New Job Form</h3>

        <form action="{{ route('my-jobs.update', $job) }}" method="post">
            @csrf
            @method('put')
            <div class="grid grid-cols-2 gap-4">
                <div class="space-y-2">
                    <x-label for="title" :required="true">Job Title</x-label>
                    <x-text-input name="title" :value="$job->title" />
                </div>
                <div class="space-y-2">
                    <x-label for="location" :required="true">Job Location</x-label>
                    <x-text-input name="location" :value="$job->location" />
                </div>
                <div class="space-y-2 col-span-2">
                    <x-label for="salary" :required="true">Salary</x-label>
                    <x-text-input type="number" name="salary" :value="$job->salary" />
                </div>
                <div class="space-y-2 col-span-2">
                    <x-label for="description" :required="true">Job Description</x-label>
                    <x-text-input type="textarea" name="description" :value="$job->description" />
                </div>

                <div>
                    <x-label for="experience" :required="true">Required Experience</x-label>
                    <x-radio-group name="experience" :options="\App\Models\Job::$experiences" :enable-all-option="false" :value="$job->experience" />
                </div>
                <div>
                    <x-label for="experience" :required="true">Job Category</x-label>
                    <x-radio-group name="category" :options="\App\Models\Job::$categories" :enable-all-option="false" :value="$job->category" />
                </div>
            </div>

            <div>
                <button type="submit" class="mt-4 w-full rounded-md bg-slate-700 text-white px-2 py-1">
                    Edit Job
                </button>
            </div>
        </form>
    </x-card>

</x-layout>
