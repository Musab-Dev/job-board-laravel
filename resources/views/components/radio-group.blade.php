<div>
    <p>
        <input type="radio" name="{{ $name }}" value="" @checked(!request($name)) />
        <span>All</span>
    </p>

    @foreach ($options as $option)
        <p>
            <input type="radio" name="{{ $name }}" id="{{ $name }}" value="{{ $option }}"
                @checked(request($name) === $option) />
            <span>{{ Str::ucfirst($option) }}</span>
        </p>
    @endforeach
</div>
