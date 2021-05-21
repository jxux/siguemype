<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Configuraciones') }}
        </h2>
    </x-slot>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-1">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-4">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    @livewire('admin.cuenta')
                </div>
            </div>
        </div>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-4">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    @livewire('admin.costos')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
