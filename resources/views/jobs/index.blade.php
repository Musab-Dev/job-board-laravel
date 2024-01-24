<x-layout>
    <x-breadcrumbs class="mb-4" :links="['Jobs' => '#']" />
    <x-card class="mb-4">
        <form id="jobs-filters" method="GET" action="{{ route('jobs.index') }}">
            <div class="grid grid-cols-2 gap-2 text-sm">
                <div>
                    <div class="font-semibold mb-1">Search</div>
                    <x-text-input type="text" name="search" value="{{ request('search') }}" placeholder="Search..."
                        form-id="jobs-filters" />
                </div>
                <div>
                    <div class="font-semibold mb-1">Salary</div>
                    <div class="flex space-x-1">
                        <x-text-input type="number" name="min_salary" value="{{ request('min_salary') }}"
                            placeholder="From" form-id="jobs-filters" />
                        <x-text-input type="number" name="max_salary" value="{{ request('max_salary') }}"
                            placeholder="To" form-id="jobs-filters" />
                    </div>
                </div>

                <div>
                    <div class="font-semibold mb-1">Experience</div>
                    <x-radio-group name="experience" :options="App\Models\Job::$experiences" />
                </div>
                <div>
                    <div class="font-semibold mb-1">Category</div>
                    <x-radio-group name="category" :options="App\Models\Job::$categories" />
                </div>
            </div>
            <div>
                <button type="submit" class="mt-3 w-full rounded-md bg-slate-700 text-white px-2 py-1">
                    Apply Filters
                </button>
            </div>
        </form>
    </x-card>
    @foreach ($jobs as $job)
        <x-job-card :job="$job">
            <x-link-button :href="route('jobs.show', $job)">
                View Job
            </x-link-button>
        </x-job-card>
    @endforeach
</x-layout>
