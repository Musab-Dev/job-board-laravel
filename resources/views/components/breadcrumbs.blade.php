<nav class="{{ $attributes->get('class') }}">
    <ul class="flex space-x-2">
        <li>
            <a href="/">Home</a>
        </li>

        @foreach ($links as $label => $link)
            <li>
                →
            </li>
            <li>
                <a href="{{ $link }}">
                    {{ $label }}
                </a>
            </li>
        @endforeach

    </ul>
</nav>
