<div>
    @if ($enableAllOption)
        <p>
            <input type="radio" name="{{ $name }}" value="" @checked(!request($name)) />
            <span>All</span>
        </p>
    @endif

    @foreach ($options as $option)
        <p>
            <input type="radio" name="{{ $name }}" id="{{ $name }}" value="{{ $option }}"
                @checked($option === ($value ?? request($name))) />
            <span>{{ Str::ucfirst($option) }}</span>
        </p>
    @endforeach

    @error($name)
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
