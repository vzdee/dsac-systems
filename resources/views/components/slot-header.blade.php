@props([
    'eyebrow' => null,
    'title' => 'Título de la página',
    'description' => null,
])
<x-slot:header>
    <div class="flex flex-col gap-4 border-l-4 border-[#B0393F] pl-5">
        <div>
            @if ($eyebrow)
                <p class="text-xs font-semibold uppercase tracking-wide text-[#B0393F]">
                    {{ $eyebrow }}
                </p>
            @endif

            <h2 class="mt-1 text-2xl font-semibold text-gray-800 md:text-3xl">
                {{ $title }}
            </h2>
        </div>

        @if ($description)
            <p class="max-w-4xl text-sm leading-6 text-gray-500">
                {{ $description }}
            </p>
        @endif
    </div>
</x-slot:header>
