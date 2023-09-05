<x-app-layout>
    <x-slot name="header">
        {{-- Contenuto visibile solo agli admin --}}
        {{-- @can('admin', $adminInfo) --}}
        @can('admin')
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Admin Dashboard</h2>
                <p class="text-lg py-3">Contenuto visibile soltanto dall'admin.</p>
                {{-- <p class="text-lg py-3">{{ $adminInfo }}</p> --}}
            <button class="rounded-full bg-sky-700 px-2 py-1 text-white hover:bg-emerald-600">
                Azione admin</button>

        {{-- Contenuto visibile ad utenti non admin --}}
        {{-- @elseif('vice')
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Vice Dashboard</h2>
        @elseif('tecnici')
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Technical staff Dashboard</h2>
        @elseif('impiegati')
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Employee Dashboard</h2> --}}
        {{-- @else
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                User Dashboard</h2> --}}
        @endcan
    </x-slot>

    {{-- Contenuto negato --}}
    {{-- @cannot('admin')
        <p class="p-4">Info personali dell'utente.</p>
    @endcannot
    --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
