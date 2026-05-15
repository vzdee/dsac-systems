<nav class="fixed top-0 z-50 w-full bg-neutral-primary-soft border-b border-default">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">

            <!-- Left side -->
            <div class="flex items-center justify-start rtl:justify-end">
                <a href="{{ route('dashboard') }}" class="flex items-center">
                    <x-application-mark class="block h-9 w-auto" />
                </a>
            </div>

            <!-- Right side -->
            <div class="flex items-center">
                <div class="relative flex items-center ms-3">

                    <!-- User button -->
                    <button type="button"
                        class="flex items-center gap-3 rounded-full bg-white px-2 py-1.5 text-sm hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-gray-200 transition"
                        aria-expanded="false" data-dropdown-toggle="dropdown-user">
                        <span class="sr-only">Open user menu</span>

                        <!-- User Photo -->
                        <img class="size-9 rounded-full object-cover border border-gray-200"
                            src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />

                        <!-- User Info Desktop -->
                        <div class="hidden md:block text-left">
                            <div class="text-sm font-semibold text-gray-800 leading-4">
                                {{ Auth::user()->name }}
                            </div>
                        </div>

                        <!-- Arrow -->
                        <svg class="hidden md:block size-4 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>

                    <!-- Dropdown -->
                    <div id="dropdown-user"
                        class="z-50 hidden absolute right-0 top-full mt-2 w-64 bg-white border border-gray-200 rounded-xl shadow-lg overflow-hidden">
                        <!-- User Info -->
                        <div class="px-4 py-3 border-b border-gray-100">
                            <div class="flex items-center gap-3">
                                <img class="size-10 rounded-full object-cover border border-gray-200"
                                    src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />

                                <div class="min-w-0">
                                    <div class="font-medium text-sm text-gray-800 truncate">
                                        {{ Auth::user()->name }}
                                    </div>

                                    <div class="font-medium text-xs text-gray-500 truncate">
                                        {{ Auth::user()->email }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Account Management -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Account') }}
                        </div>

                        <ul class="p-2 text-sm text-gray-700 font-medium" role="none">
                            <li>
                                <x-dropdown-link href="{{ route('profile.show') }}">
                                    {{ __('Profile') }}
                                </x-dropdown-link>
                            </li>

                            <li>
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf

                                    <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>

        </div>
    </div>
</nav>
