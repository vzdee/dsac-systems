@props(['tab', 'error' => false])

<div x-show="tab === '{{ $tab }}'" x-cloak>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-3">
        {{ $slot }}
    </div>
</div>
