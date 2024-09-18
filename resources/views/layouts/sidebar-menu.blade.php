<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="flex">
        <!-- Sidebar -->
        <aside class="bg-white border-r border-gray-200 w-64 min-h-screen">
            <div class="p-6">
                <!-- Logo -->
                <div class="text-xl font-bold text-gray-900">
                    <a href="{{ route('dashboard') }}">{{ __('POS System') }}</a>
                </div>

                <!-- Navigation Links -->
                <nav class="mt-6">
                    <ul>
                        <li>
                            <a href="{{ route('dashboard') }}"
                               class="block px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-md {{ request()->routeIs('dashboard') ? 'bg-gray-200' : '' }}">
                                {{ __('Dashboard') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('categories') }}"
                               class="block px-4 py-2 text-gray-700 hover:bg-gray-100 rounded-md {{ request()->routeIs('categories') ? 'bg-gray-200' : '' }}">
                                {{ __('Categories') }}
                            </a>
                        </li>



                    </ul>
                </nav>
            </div>
        </aside>

        <!-- Content -->
        <main class="flex-1 bg-gray-100 p-6">
            {{ $slot }}
        </main>
    </div>
</x-app-layout>
