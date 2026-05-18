@php
    $links = [
        [
            'name' => 'Panel Administrador',
            'icon' => 'fa-solid fa-sliders',
            'route' => route('admin.dashboard'),
            'active' => request()->routeIs('admin.dashboard'),
        ],
        [
            'name' => 'Gestionar Empleados',
            'icon' => 'fa-solid fa-user-tie',
            'route' => route('admin.employees.index'),
            'active' => request()->routeIs('admin.employees.*'),
        ],
        [
            'name' => 'Gestionar Clientes',
            'icon' => 'fa-solid fa-user-gear',
            'route' => route('admin.clients.index'),
            'active' => request()->routeIs('admin.clients.*'),
        ],[
            'name' => 'Gestionar Citas',
            'icon' => 'fa-solid fa-calendar-day',
            'route' => '#',
             'active' => false,
        ],[
            'name' => 'Configurar Servicios',
            'icon' => 'fa-solid fa-screwdriver-wrench',
            'route' => route('admin.services.index'),
             'active' => request()->routeIs('admin.services.*'),
        ]
    ];
@endphp

<aside id="top-bar-sidebar"
    class="fixed left-0 top-16 z-40 h-[calc(100vh-4rem)] w-64 -translate-x-full border-r border-slate-200 bg-white transition-transform sm:translate-x-0"
    aria-label="Sidebar">
    <div class="flex h-full flex-col">

        <div class="border-b border-slate-100 px-5 py-5">
            <p class="mt-8 text-xs font-semibold uppercase tracking-[0.2em] text-[#B0393F]/70">Menú</p>

            <h2 class="mt-1 text-lg font-bold text-slate-800">Administración</h2>
        </div>

        <nav class="flex-1 overflow-y-auto px-3 py-4">
            <ul class="space-y-1.5">
                @foreach ($links as $link)
                    <li>
                        <a href="{{ $link['route'] }}"
                            class="group flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium transition {{ $link['active']
                                ? 'bg-[#B0393F] text-white shadow-sm shadow-[#B0393F]/25'
                                : 'text-slate-600 hover:bg-[#B0393F]/10 hover:text-[#B0393F]' }}">
                            <span
                                class="flex size-9 items-center justify-center rounded-lg transition {{ $link['active']
                                    ? 'bg-white/15 text-white'
                                    : 'bg-slate-100 text-slate-500 group-hover:bg-[#B0393F]/15 group-hover:text-[#B0393F]' }}">
                                <i class="{{ $link['icon'] }} text-sm"></i>
                            </span>
                            <span class="truncate">{{ $link['name'] }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </nav>
    </div>
</aside>
