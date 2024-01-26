<x-layout>
    <x-breadcrumbs class="mb-4" :links="['Be an Employer' => '#']" />

    <x-card>
        <form action="{{ route('employer.store') }}" method="post">
            @csrf
            <div class="flex flex-col space-y-3">
                <x-label for="company_name" :required="true">Your Company Name</x-label>
                <x-text-input name="company_name" />
            </div>

            <button class="mt-6 rounded-md bg-slate-700 text-white px-2 py-1 w-full">Confirm</button>
        </form>
    </x-card>
</x-layout>
