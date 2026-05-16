@props(['breadcrumbs' => [], 'titleWindow' => ''])
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'DSAC') }}{{ $titleWindow ? ' | ' . $titleWindow : '' }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    @livewireStyles
</head>

<body class="font-sans antialiased bg-slate-100 text-slate-900">
    <x-banner />

    <div class="min-h-screen bg-slate-100">

        @include('components.admin.navigation-menu')
        @include('components.admin.sidebar')

        <!-- Page Content -->
        <main class="min-h-screen pt-16 sm:ml-64">
            <div class="p-4 sm:p-6 lg:p-8">
                <div class="mb-4">
                    @include('components.admin.breadcrumb')
                </div>
                <div class="min-h-[calc(100vh-6rem)] rounded-2xl border border-slate-200 bg-white shadow-sm p-5 sm:p-6">
                    {{ $slot }}
                </div>
            </div>
        </main>
    </div>

    @stack('modals')
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.js"></script>
</body>
</html>
