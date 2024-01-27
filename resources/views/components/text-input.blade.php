<div>
    <div class="relative">
        @isset($formId)
            <button type="button"
                onclick="document.getElementById('{{ $name }}').value = ''; document.getElementById('{{ $name }}').focus();document.getElementById('{{ $formId }}').submit();"
                class="absolute top-0 right-0 text-slate-500 flex items-center h-full pr-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
        @endisset
        @error($name)
            <div class="absolute top-0 right-0 text-red-500 pr-2 flex items-center h-full">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                </svg>
            </div>
        @enderror

        @if ($type != 'textarea')
            <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}"
                value="{{ old($name, $value) }}" placeholder="{{ $placeholder }}" @class([
                    'w-full text-sm rounded-md border focus:ring-1 focus:ring-slate-600 px-2.5 py-1.5 placeholder:text-slate-400',
                    'border-slate-200' => !$errors->has($name),
                    'border-red-500' => $errors->has($name),
                    'pr-8' => $formId || $errors->has($name),
                ]) />
        @else
            <textarea name="{{ $name }}" id="{{ $name }}" placeholder="{{ $placeholder }}"
                @class([
                    'w-full text-sm rounded-md border focus:ring-1 focus:ring-slate-600 px-2.5 py-1.5 placeholder:text-slate-400',
                    'border-slate-200' => !$errors->has($name),
                    'border-red-500' => $errors->has($name),
                    'pr-8' => $formId || $errors->has($name),
                ])>{{ old($name, $value) }}</textarea>
        @endif

    </div>
    @error($name)
        <p class="text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
