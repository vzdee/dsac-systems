<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DSAC | Despacho de Servicios y Asesoría Contable Fiscal</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>

<body class="bg-white text-gray-900 antialiased">

    {{-- NAVBAR --}}
    <header class="fixed top-0 left-0 z-50 w-full border-b border-gray-100 bg-white/90 backdrop-blur-xl">
        <nav class="mx-auto flex max-w-7xl items-center justify-between px-5 py-3 lg:px-8">

            {{-- Logo --}}
            <a href="#inicio" class="flex items-center gap-3">
                <img src="https://res.cloudinary.com/dxsufvxeu/image/upload/v1776494039/test1_efvniy.png"
                    alt="Logo DSAC" class="h-10 w-auto object-contain">
            </a>

            {{-- Menu Desktop --}}
            <div class="hidden items-center gap-8 md:flex">
                <a href="#inicio" class="text-sm font-medium text-gray-700 transition hover:text-[#B0393F]">Inicio</a>
                <a href="#servicios"
                    class="text-sm font-medium text-gray-700 transition hover:text-[#B0393F]">Servicios</a>
                <a href="#nosotros"
                    class="text-sm font-medium text-gray-700 transition hover:text-[#B0393F]">Nosotros</a>
                <a href="#faq" class="text-sm font-medium text-gray-700 transition hover:text-[#B0393F]">FAQ</a>
                <a href="#contacto"
                    class="text-sm font-medium text-gray-700 transition hover:text-[#B0393F]">Contacto</a>
            </div>

            {{-- CTA Desktop --}}
            <a href="https://wa.me/529999999999" target="_blank"
                class="hidden rounded-full bg-[#B0393F] px-5 py-2.5 text-sm font-semibold text-white shadow-lg shadow-red-900/20 transition hover:bg-[#922d33] md:inline-flex">
                <i class="fa-brands fa-whatsapp mr-2"></i>
                Contáctanos
            </a>

            {{-- Mobile button --}}
            <input type="checkbox" id="menu-toggle" class="peer hidden">

            <label for="menu-toggle" class="flex cursor-pointer flex-col gap-1.5 md:hidden">
                <span class="h-0.5 w-6 rounded-full bg-gray-900"></span>
                <span class="h-0.5 w-6 rounded-full bg-gray-900"></span>
                <span class="h-0.5 w-6 rounded-full bg-gray-900"></span>
            </label>

            {{-- Mobile Menu --}}
            <div
                class="absolute left-0 top-full hidden w-full border-b border-gray-100 bg-white px-5 py-5 shadow-xl peer-checked:block md:hidden">
                <div class="flex flex-col gap-4">
                    <a href="#inicio" class="text-sm font-medium text-gray-700">Inicio</a>
                    <a href="#servicios" class="text-sm font-medium text-gray-700">Servicios</a>
                    <a href="#nosotros" class="text-sm font-medium text-gray-700">Nosotros</a>
                    <a href="#faq" class="text-sm font-medium text-gray-700">FAQ</a>
                    <a href="#contacto" class="text-sm font-medium text-gray-700">Contacto</a>

                    <a href="https://wa.me/529999999999" target="_blank"
                        class="mt-2 inline-flex w-full items-center justify-center rounded-full bg-[#B0393F] px-5 py-3 text-sm font-semibold text-white">
                        <i class="fa-brands fa-whatsapp mr-2"></i>
                        Contáctanos
                    </a>
                </div>
            </div>
        </nav>
    </header>

    {{-- HERO --}}
    <section id="inicio" class="relative overflow-hidden pt-24 lg:pt-28">
        <div class="absolute inset-0 -z-10 bg-gradient-to-br from-white via-white to-red-50"></div>

        <div class="mx-auto grid max-w-7xl items-center gap-10 px-5 py-12 lg:grid-cols-2 lg:px-8 lg:py-20">

            {{-- Texto --}}
            <div class="text-center lg:text-left">
                <div class="mb-6 flex justify-center lg:justify-start">
                    <img src="https://res.cloudinary.com/dxsufvxeu/image/upload/v1776494039/test1_efvniy.png"
                        alt="DSAC Logo" class="h-28 w-auto object-contain sm:h-32">
                </div>

                <span
                    class="inline-flex rounded-full bg-red-50 px-4 py-2 text-xs font-bold uppercase tracking-wide text-[#B0393F]">
                    Despacho contable fiscal
                </span>

                <h1 class="mt-5 text-4xl font-black leading-tight tracking-tight text-gray-950 sm:text-5xl lg:text-6xl">
                    Soluciones contables y
                    <span class="text-[#B0393F]">fiscales</span> integrales.
                </h1>

                <p class="mx-auto mt-6 max-w-xl text-base leading-7 text-gray-600 lg:mx-0">
                    Te ayudamos a mantener tus obligaciones fiscales en orden, optimizar tus procesos contables y tomar
                    mejores decisiones para tu negocio.
                </p>

                <div class="mt-7 space-y-3 text-left sm:mx-auto sm:max-w-md lg:mx-0">
                    <div class="flex items-center gap-3">
                        <span class="flex h-6 w-6 items-center justify-center rounded-full bg-red-50 text-[#B0393F]">
                            <i class="fa-solid fa-check text-xs"></i>
                        </span>
                        <p class="text-sm text-gray-700">Diagnóstico claro de tu situación fiscal actual.</p>
                    </div>

                    <div class="flex items-center gap-3">
                        <span class="flex h-6 w-6 items-center justify-center rounded-full bg-red-50 text-[#B0393F]">
                            <i class="fa-solid fa-check text-xs"></i>
                        </span>
                        <p class="text-sm text-gray-700">Asesoramiento laboral y formación personal.</p>
                    </div>

                    <div class="flex items-center gap-3">
                        <span class="flex h-6 w-6 items-center justify-center rounded-full bg-red-50 text-[#B0393F]">
                            <i class="fa-solid fa-check text-xs"></i>
                        </span>
                        <p class="text-sm text-gray-700">Apoyo en procesos de inspección y aclaración.</p>
                    </div>
                </div>

                <div class="mt-9 flex flex-col justify-center gap-4 sm:flex-row lg:justify-start">
                    <a href="#servicios"
                        class="inline-flex items-center justify-center rounded-full bg-[#B0393F] px-7 py-3 text-sm font-bold text-white shadow-lg shadow-red-900/20 transition hover:bg-[#922d33]">
                        Nuestros servicios
                    </a>

                    <a href="https://wa.me/529999999999" target="_blank"
                        class="inline-flex items-center justify-center rounded-full border border-gray-300 bg-white px-7 py-3 text-sm font-bold text-gray-800 transition hover:border-[#B0393F] hover:text-[#B0393F]">
                        <i class="fa-brands fa-whatsapp mr-2"></i>
                        Cotiza tu servicio
                    </a>
                </div>
            </div>

            {{-- Imagen Hero --}}
            <div class="relative">
                <div class="absolute -right-8 -top-8 h-40 w-40 rounded-full bg-red-100 blur-3xl"></div>
                <div class="absolute -bottom-8 -left-8 h-40 w-40 rounded-full bg-gray-200 blur-3xl"></div>

                <div
                    class="relative overflow-hidden rounded-[2rem] bg-white shadow-2xl shadow-gray-300/60 ring-1 ring-gray-100">
                    <img src="https://res.cloudinary.com/dxsufvxeu/image/upload/v1776393165/Rectangle_26_r0drtz.svg"
                        alt="Equipo DSAC" class="h-full w-full object-cover">
                </div>
            </div>
        </div>
    </section>

    {{-- BENEFICIOS --}}
    <section class="border-y border-gray-100 bg-white py-10">
        <div class="mx-auto grid max-w-7xl gap-6 px-5 sm:grid-cols-2 lg:grid-cols-3 lg:px-8">

            <div class="flex gap-4 rounded-2xl bg-gray-50 p-5">
                <div
                    class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-white text-xl text-[#B0393F] shadow-sm">
                    <i class="fa-solid fa-calculator"></i>
                </div>
                <div>
                    <h3 class="font-bold text-gray-900">Tranquilidad fiscal</h3>
                    <p class="mt-1 text-sm leading-6 text-gray-600">
                        Gestionamos tus trámites y declaraciones para que cumplas con el SAT sin errores.
                    </p>
                </div>
            </div>

            <div class="flex gap-4 rounded-2xl bg-gray-50 p-5">
                <div
                    class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-white text-xl text-[#B0393F] shadow-sm">
                    <i class="fa-solid fa-bullseye"></i>
                </div>
                <div>
                    <h3 class="font-bold text-gray-900">Estrategia a tu medida</h3>
                    <p class="mt-1 text-sm leading-6 text-gray-600">
                        Traducimos tus números en acciones claras para optimizar recursos y hacer crecer tu negocio.
                    </p>
                </div>
            </div>

            <div class="flex gap-4 rounded-2xl bg-gray-50 p-5 sm:col-span-2 lg:col-span-1">
                <div
                    class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-white text-xl text-[#B0393F] shadow-sm">
                    <i class="fa-regular fa-clock"></i>
                </div>
                <div>
                    <h3 class="font-bold text-gray-900">Recupera tu tiempo</h3>
                    <p class="mt-1 text-sm leading-6 text-gray-600">
                        Absorbemos la carga administrativa para que te enfoques en dirigir tu empresa.
                    </p>
                </div>
            </div>

        </div>
    </section>

    {{-- SOBRE NOSOTROS --}}
    <section id="nosotros" class="bg-white py-20">
        <div class="mx-auto grid max-w-7xl items-center gap-12 px-5 lg:grid-cols-2 lg:px-8">

            <div>
                <span class="text-sm font-bold uppercase tracking-widest text-[#B0393F]">
                    Sobre nosotros
                </span>

                <h2 class="mt-3 text-3xl font-black tracking-tight text-gray-950 sm:text-4xl">
                    Más que contabilidad, somos aliados para tu crecimiento.
                </h2>

                <div class="mt-6 space-y-5 text-base leading-7 text-gray-600">
                    <p>
                        Fundado en 2012, en <strong class="text-[#B0393F]">DSAC</strong> tenemos un propósito claro:
                        transformar la contabilidad en una verdadera herramienta de crecimiento.
                    </p>

                    <p>
                        Más allá de los números, nuestra filosofía se basa en construir relaciones sólidas y duraderas,
                        cimentadas en la confianza mutua con cada uno de nuestros clientes.
                    </p>

                    <p>
                        Con tus aliados estratégicos, nos distinguimos por garantizar una calidad impecable mediante un
                        trato directo y personalizado.
                    </p>
                </div>

                <div class="mt-10 grid grid-cols-3 gap-4">
                    <div class="rounded-2xl border border-gray-100 bg-gray-50 p-4 text-center">
                        <i class="fa-solid fa-briefcase mb-2 text-xl text-[#B0393F]"></i>
                        <p class="text-2xl font-black text-gray-950">10%</p>
                        <p class="mt-1 text-xs font-semibold uppercase text-gray-500">Trámites exitosos</p>
                    </div>

                    <div class="rounded-2xl border border-gray-100 bg-gray-50 p-4 text-center">
                        <i class="fa-solid fa-users mb-2 text-xl text-[#B0393F]"></i>
                        <p class="text-2xl font-black text-gray-950">1,000+</p>
                        <p class="mt-1 text-xs font-semibold uppercase text-gray-500">Clientes satisfechos</p>
                    </div>

                    <div class="rounded-2xl border border-gray-100 bg-gray-50 p-4 text-center">
                        <i class="fa-solid fa-house mb-2 text-xl text-[#B0393F]"></i>
                        <p class="text-2xl font-black text-gray-950">14+</p>
                        <p class="mt-1 text-xs font-semibold uppercase text-gray-500">Años nos respaldan</p>
                    </div>
                </div>
            </div>

            <div class="relative">
                <div class="absolute inset-0 translate-x-4 translate-y-4 rounded-[2rem] bg-red-100"></div>

                <div class="relative overflow-hidden rounded-[2rem] bg-gray-100 shadow-xl">
                    <img src="https://res.cloudinary.com/dxsufvxeu/image/upload/v1776393165/Rectangle_26_r0drtz.svg"
                        alt="Equipo DSAC" class="h-full w-full object-cover">
                </div>
            </div>

        </div>
    </section>

    {{-- SERVICIOS --}}
    <section id="servicios" class="bg-gray-50 py-20">
        <div class="mx-auto max-w-7xl px-5 lg:px-8">

            <div class="mx-auto max-w-2xl text-center">
                <span class="text-sm font-bold uppercase tracking-widest text-[#B0393F]">
                    Nuestros servicios
                </span>

                <h2 class="mt-3 text-3xl font-black tracking-tight text-gray-950 sm:text-4xl">
                    Servicios pensados para personas, negocios y empresas.
                </h2>

                <p class="mt-4 text-gray-600">
                    Te acompañamos desde la asesoría básica hasta la gestión fiscal y contable completa.
                </p>
            </div>

            <div class="mt-12 grid gap-6 md:grid-cols-2 lg:grid-cols-3">

                {{-- Servicio 1 --}}
                <article
                    class="group rounded-[1.7rem] border border-gray-100 bg-white p-7 shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
                    <div
                        class="mb-6 flex h-14 w-14 items-center justify-center rounded-2xl bg-red-50 text-2xl text-[#B0393F]">
                        <i class="fa-solid fa-user-tie"></i>
                    </div>

                    <h3 class="text-xl font-black text-gray-950">
                        Asesoría y consultoría personal
                    </h3>

                    <ul class="mt-5 space-y-3 text-sm leading-6 text-gray-600">
                        <li class="flex gap-2">
                            <i class="fa-solid fa-check mt-1 text-[#B0393F]"></i>
                            Asesoría fiscal continua.
                        </li>
                        <li class="flex gap-2">
                            <i class="fa-solid fa-check mt-1 text-[#B0393F]"></i>
                            Planificación fiscal.
                        </li>
                        <li class="flex gap-2">
                            <i class="fa-solid fa-check mt-1 text-[#B0393F]"></i>
                            Atención en inspecciones y aclaraciones.
                        </li>
                        <li class="flex gap-2">
                            <i class="fa-solid fa-check mt-1 text-[#B0393F]"></i>
                            Asesoramiento en gestión y sucesión de empresas familiares.
                        </li>
                    </ul>

                    <a href="#contacto" class="mt-6 inline-flex items-center text-sm font-bold text-[#B0393F]">
                        Solicitar información
                        <i class="fa-solid fa-arrow-right ml-2 text-xs"></i>
                    </a>
                </article>

                {{-- Servicio 2 --}}
                <article
                    class="group rounded-[1.7rem] border border-gray-100 bg-white p-7 shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
                    <div
                        class="mb-6 flex h-14 w-14 items-center justify-center rounded-2xl bg-red-50 text-2xl text-[#B0393F]">
                        <i class="fa-solid fa-file-invoice"></i>
                    </div>

                    <h3 class="text-xl font-black text-gray-950">
                        Gestión y cumplimiento ante el SAT
                    </h3>

                    <ul class="mt-5 space-y-3 text-sm leading-6 text-gray-600">
                        <li class="flex gap-2">
                            <i class="fa-solid fa-check mt-1 text-[#B0393F]"></i>
                            Asesoría fiscal y contable.
                        </li>
                        <li class="flex gap-2">
                            <i class="fa-solid fa-check mt-1 text-[#B0393F]"></i>
                            Presentación de declaraciones.
                        </li>
                        <li class="flex gap-2">
                            <i class="fa-solid fa-check mt-1 text-[#B0393F]"></i>
                            Atención a procesos de inspección.
                        </li>
                        <li class="flex gap-2">
                            <i class="fa-solid fa-check mt-1 text-[#B0393F]"></i>
                            Apoyo en trámites y aclaraciones fiscales.
                        </li>
                    </ul>

                    <a href="#contacto" class="mt-6 inline-flex items-center text-sm font-bold text-[#B0393F]">
                        Solicitar información
                        <i class="fa-solid fa-arrow-right ml-2 text-xs"></i>
                    </a>
                </article>

                {{-- Servicio 3 --}}
                <article
                    class="group rounded-[1.7rem] border border-gray-100 bg-white p-7 shadow-sm transition hover:-translate-y-1 hover:shadow-xl md:col-span-2 lg:col-span-1">
                    <div
                        class="mb-6 flex h-14 w-14 items-center justify-center rounded-2xl bg-red-50 text-2xl text-[#B0393F]">
                        <i class="fa-solid fa-building-columns"></i>
                    </div>

                    <h3 class="text-xl font-black text-gray-950">
                        Nómina, IMSS y Hacienda estatal
                    </h3>

                    <ul class="mt-5 space-y-3 text-sm leading-6 text-gray-600">
                        <li class="flex gap-2">
                            <i class="fa-solid fa-check mt-1 text-[#B0393F]"></i>
                            Gestión de nómina.
                        </li>
                        <li class="flex gap-2">
                            <i class="fa-solid fa-check mt-1 text-[#B0393F]"></i>
                            Asesoría fiscal continua.
                        </li>
                        <li class="flex gap-2">
                            <i class="fa-solid fa-check mt-1 text-[#B0393F]"></i>
                            Cumplimiento de obligaciones laborales.
                        </li>
                        <li class="flex gap-2">
                            <i class="fa-solid fa-check mt-1 text-[#B0393F]"></i>
                            Atención de requerimientos ante instituciones.
                        </li>
                    </ul>

                    <a href="#contacto" class="mt-6 inline-flex items-center text-sm font-bold text-[#B0393F]">
                        Solicitar información
                        <i class="fa-solid fa-arrow-right ml-2 text-xs"></i>
                    </a>
                </article>

            </div>

            <div class="mt-12 flex flex-col justify-center gap-4 sm:flex-row">
                <a href="https://wa.me/529999999999" target="_blank"
                    class="inline-flex items-center justify-center rounded-full bg-[#B0393F] px-7 py-3 text-sm font-bold text-white shadow-lg shadow-red-900/20 transition hover:bg-[#922d33]">
                    <i class="fa-brands fa-whatsapp mr-2"></i>
                    Cotiza tu servicio
                </a>

                <a href="#contacto"
                    class="inline-flex items-center justify-center rounded-full border border-gray-300 bg-white px-7 py-3 text-sm font-bold text-gray-800 transition hover:border-[#B0393F] hover:text-[#B0393F]">
                    <i class="fa-solid fa-calendar-check mr-2"></i>
                    Agendar asistencia
                </a>
            </div>

        </div>
    </section>

    {{-- FAQ + CONTACTO --}}
    <section id="faq" class="bg-white py-20">
        <div class="mx-auto grid max-w-7xl gap-12 px-5 lg:grid-cols-2 lg:px-8">

            {{-- FAQ --}}
            <div>
                <span class="text-sm font-bold uppercase tracking-widest text-[#B0393F]">
                    Preguntas frecuentes
                </span>

                <h2 class="mt-3 text-3xl font-black tracking-tight text-gray-950 sm:text-4xl">
                    Resolvemos tus dudas más comunes.
                </h2>

                <div class="mt-8 space-y-4">
                    <details class="group rounded-2xl border border-gray-100 bg-gray-50 p-5">
                        <summary
                            class="flex cursor-pointer list-none items-center justify-between font-bold text-gray-900">
                            ¿Me asesoran con la emisión de mis facturas electrónicas CFDI?
                            <i
                                class="fa-solid fa-chevron-down text-sm text-[#B0393F] transition group-open:rotate-180"></i>
                        </summary>
                        <p class="mt-3 text-sm leading-6 text-gray-600">
                            Sí, te asesoramos para emitir tus facturas correctamente y cumplir con la normativa vigente.
                        </p>
                    </details>

                    <details class="group rounded-2xl border border-gray-100 bg-gray-50 p-5">
                        <summary
                            class="flex cursor-pointer list-none items-center justify-between font-bold text-gray-900">
                            Mi firma electrónica está vencida, ¿me pueden ayudar?
                            <i
                                class="fa-solid fa-chevron-down text-sm text-[#B0393F] transition group-open:rotate-180"></i>
                        </summary>
                        <p class="mt-3 text-sm leading-6 text-gray-600">
                            Claro, podemos orientarte en el proceso para tramitar, renovar o recuperar tu Firma
                            Electrónica.
                        </p>
                    </details>

                    <details class="group rounded-2xl border border-gray-100 bg-gray-50 p-5">
                        <summary
                            class="flex cursor-pointer list-none items-center justify-between font-bold text-gray-900">
                            ¿Cómo funciona el diagnóstico gratuito?
                            <i
                                class="fa-solid fa-chevron-down text-sm text-[#B0393F] transition group-open:rotate-180"></i>
                        </summary>
                        <p class="mt-3 text-sm leading-6 text-gray-600">
                            Revisamos tu situación fiscal inicial y te explicamos de forma clara qué necesitas corregir
                            o mejorar.
                        </p>
                    </details>

                    <details class="group rounded-2xl border border-gray-100 bg-gray-50 p-5">
                        <summary
                            class="flex cursor-pointer list-none items-center justify-between font-bold text-gray-900">
                            ¿Necesito ir a su oficina cada mes?
                            <i
                                class="fa-solid fa-chevron-down text-sm text-[#B0393F] transition group-open:rotate-180"></i>
                        </summary>
                        <p class="mt-3 text-sm leading-6 text-gray-600">
                            No necesariamente. También podemos atenderte por medios digitales, correo, WhatsApp o
                            videollamada.
                        </p>
                    </details>
                </div>
            </div>

            {{-- Contacto --}}
            <div id="contacto" class="rounded-[2rem] bg-gray-50 p-6 shadow-sm ring-1 ring-gray-100 sm:p-8">
                <span class="text-sm font-bold uppercase tracking-widest text-[#B0393F]">
                    Contacto
                </span>

                <h2 class="mt-3 text-3xl font-black tracking-tight text-gray-950">
                    ¿Tienes dudas o necesitas más información?
                </h2>

                <p class="mt-4 text-sm leading-6 text-gray-600">
                    Escríbenos para recibir atención personalizada y conocer cómo podemos ayudarte con tu situación
                    fiscal o contable.
                </p>

                <div class="mt-8 space-y-4">
                    <div class="flex gap-4">
                        <div
                            class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-white text-[#B0393F] shadow-sm">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900">Dirección</h3>
                            <p class="text-sm text-gray-600">
                                Chuburná 21 Colonia, Corderos de Chuburná, Mérida, Yucatán.
                            </p>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div
                            class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-white text-[#B0393F] shadow-sm">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900">Correo</h3>
                            <p class="text-sm text-gray-600">
                                dsac@gmail.com
                            </p>
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div
                            class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-white text-[#B0393F] shadow-sm">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900">Teléfono</h3>
                            <p class="text-sm text-gray-600">
                                +52 999 999 9999
                            </p>
                        </div>
                    </div>
                </div>

                <div class="mt-8">
                    <a href="https://wa.me/529999999999" target="_blank"
                        class="inline-flex w-full items-center justify-center rounded-full bg-[#B0393F] px-7 py-3 text-sm font-bold text-white shadow-lg shadow-red-900/20 transition hover:bg-[#922d33]">
                        <i class="fa-brands fa-whatsapp mr-2"></i>
                        Cotiza tu servicio
                    </a>
                </div>

                {{-- Mapa --}}
                <div class="mt-8 overflow-hidden rounded-3xl border border-gray-200 bg-white">
                    <iframe class="h-64 w-full"
                        src="https://www.google.com/maps?q=M%C3%A9rida%20Yucat%C3%A1n&output=embed" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>

        </div>
    </section>

    {{-- FOOTER --}}
    <footer class="bg-gray-950 text-white">
        <div class="mx-auto grid max-w-7xl gap-10 px-5 py-12 sm:grid-cols-2 lg:grid-cols-4 lg:px-8">

            <div class="sm:col-span-2">
                <img src="https://res.cloudinary.com/dxsufvxeu/image/upload/v1776494039/test1_efvniy.png"
                    alt="Logo DSAC" class="h-14 w-auto rounded bg-white object-contain p-1">

                <p class="mt-5 max-w-md text-sm leading-6 text-gray-400">
                    Despacho de servicios y asesoría contable fiscal enfocado en brindar soluciones claras,
                    profesionales y personalizadas.
                </p>
                <a href="{{ route('login') }}" class="mt-5 inline-flex items-center text-sm font-bold text-[#B0393F]">
                    Iniciar sesión
                    <i class="fa-solid fa-arrow-right ml-2 text-xs"></i>
                </a>
            </div>

            <div>
                <h3 class="font-bold text-white">Servicios</h3>

                <ul class="mt-4 space-y-3 text-sm text-gray-400">
                    <li>Asesoría y consultoría personal</li>
                    <li>Gestión y cumplimiento ante el SAT</li>
                    <li>Nómina, IMSS y Hacienda estatal</li>
                </ul>
            </div>

            <div>
                <h3 class="font-bold text-white">Contacto</h3>

                <ul class="mt-4 space-y-3 text-sm text-gray-400">
                    <li>
                        <i class="fa-solid fa-envelope mr-2 text-[#B0393F]"></i>
                        dsac@gmail.com
                    </li>
                    <li>
                        <i class="fa-solid fa-phone mr-2 text-[#B0393F]"></i>
                        +52 999 999 9999
                    </li>
                    <li>
                        <i class="fa-solid fa-location-dot mr-2 text-[#B0393F]"></i>
                        Mérida, Yucatán
                    </li>
                </ul>
            </div>

        </div>

        <div class="border-t border-white/10 px-5 py-5">
            <p class="text-center text-xs text-gray-500">
                © {{ date('Y') }} DSAC. Todos los derechos reservados.
            </p>
        </div>
    </footer>

</body>

</html>
