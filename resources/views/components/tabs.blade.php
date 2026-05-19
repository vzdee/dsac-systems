@props(['active'])
<div x-data="{ tab: '{{ $active }}' }" class="w-full">
    @isset($header)
        <div class="mb-6 border-b border-gray-200">
            <div class="overflow-x-auto md:overflow-visible">
                <ul class="flex w-max gap-6 text-sm font-medium text-gray-500 md:w-full md:flex-wrap">
                    {{ $header }}
                </ul>
            </div>
        </div>
    @endisset

    <div class="pt-1">
        {{ $slot }}
    </div>
</div>