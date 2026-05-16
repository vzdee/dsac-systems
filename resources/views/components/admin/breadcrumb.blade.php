@if (count($breadcrumbs))
    <nav class="flex p-3 bg-white border border-slate-200 rounded-xl shadow-sm" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">

            @foreach ($breadcrumbs as $breadcrumb)
                <li class="inline-flex items-center">

                    @unless ($loop->first)
                        <svg class="w-3.5 h-3.5 mx-1 rtl:rotate-180 text-slate-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m9 5 7 7-7 7" />
                        </svg>
                    @endunless

                    @if (!$loop->last && isset($breadcrumb['route']))
                        <a href="{{ $breadcrumb['route'] }}"class="inline-flex items-center text-sm font-medium text-slate-500 hover:text-[#B0393F] transition">
                            {{ $breadcrumb['name'] }}
                        </a>
                    @else
                        <span class="inline-flex items-center text-sm font-semibold text-[#B0393F]">
                            {{ $breadcrumb['name'] }}
                        </span>
                    @endif
                </li>
            @endforeach
        </ol>
    </nav>
@endif
