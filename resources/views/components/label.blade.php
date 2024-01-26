<label for="{{ $for }}" class="block font-medium">
    {{ $slot }}
    @if ($required)
        <span class="text-red-500 text-sm">*</span>
    @endif
</label>
