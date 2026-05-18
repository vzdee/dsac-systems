@props([
    'tab',
    'error' => false,
])

<li class="me-1 sm:me-2">
    <button
        type="button"
        x-on:click="tab = '{{ $tab }}'"
        :class="{
            'text-indigo-600 border-indigo-600 bg-indigo-50 shadow-sm': tab === '{{ $tab }}' && !{{ $error ? 'true' : 'false' }},
            'text-red-600 border-red-600 bg-red-50 shadow-sm': tab === '{{ $tab }}' && {{ $error ? 'true' : 'false' }},
            'text-red-500 border-transparent hover:text-red-600 hover:border-red-300 hover:bg-red-50': tab !== '{{ $tab }}' && {{ $error ? 'true' : 'false' }},
            'text-gray-500 border-transparent hover:text-indigo-600 hover:border-indigo-300 hover:bg-indigo-50': tab !== '{{ $tab }}' && !{{ $error ? 'true' : 'false' }},
        }"
        class="group inline-flex items-center justify-center gap-2 px-3 sm:px-4 py-3 border-b-2 rounded-t-xl text-xs sm:text-sm font-medium transition-all duration-200 whitespace-nowrap"
        :aria-current="tab === '{{ $tab }}' ? 'page' : undefined"
    >
        {{ $slot }}

        @if ($error)
            <i class="fa-solid fa-circle-exclamation text-xs animate-pulse"></i>
        @endif
    </button>
</li>