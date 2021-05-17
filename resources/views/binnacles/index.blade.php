<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Parte Diario') }}
        </h2>
    </x-slot>
    <div class="py-6">
        <div class="mx-auto sm:px-6 lg:px-4">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @livewire('binnacle.binnacles')
            </div>
        </div>
    </div>
</x-app-layout>
