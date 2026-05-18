@props(['label', 'value' => null])

<div class="rounded-2xl bg-gray-50 px-5 py-4 border border-gray-100">
    <span class="block text-xs font-semibold uppercase tracking-wide text-gray-500 mb-1">
        {{ $label }}
    </span>

    <p class="text-sm sm:text-base font-medium text-gray-900 wrap-break-words">
        {{ filled($value) ? $value : 'No registrado' }}
    </p>
</div>
