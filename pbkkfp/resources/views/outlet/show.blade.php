<!-- resources/views/outlet/show.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Outlet Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h3 class="text-xl font-bold">{{ $outlet->name }}</h3>
                <p class="text-gray-600">{{ $outlet->address }}</p>
                <p class="text-sm text-gray-500">Open Hour: {{ $outlet->open_hour }} - {{ $outlet->close_hour }}</p>
            </div>
        </div>
    </div>
</x-app-layout>
