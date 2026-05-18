@props(['active'])
<div x-data="{ tab: '{{ $active }}' }" class="w-full">
    @isset($header)
        <div class="border-b border-gray-200 overflow-x-auto">
            <ul class="flex flex-nowrap -mb-px text-sm font-medium text-center text-gray-500 min-w-max">
                {{ $header }}
            </ul>
        </div>
    @endisset

    <div class="pt-6">
        {{ $slot }}
    </div>
</div>