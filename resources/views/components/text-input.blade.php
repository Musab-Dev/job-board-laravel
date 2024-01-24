<div class="relative">
    @isset($formId)
        <button type="button"
            onclick="document.getElementById('{{ $name }}').value = ''; document.getElementById('{{ $name }}').focus();document.getElementById('{{ $formId }}').submit();"
            class="absolute top-0 right-0 text-slate-500 flex items-center h-full pr-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
        </button>
    @endisset
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" value="{{ $value }}"
        placeholder="{{ $placeholder }}"
        class="w-full text-sm rounded-md border border-slate-200 focus:ring-1 focus:ring-slate-600 px-2.5 py-1.5 placeholder:text-slate-400 pr-6" />
</div>
