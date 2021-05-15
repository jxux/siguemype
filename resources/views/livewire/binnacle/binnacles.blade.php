<div wire:init="loadBinnacles">
    {{ $cuenta }}
    <x-table>
        @if (count($binnacles))
        <table class="min-w-full divide-y divide-gray-200 mx-1">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="w-24 cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="order('date')">
                        Fecha
                        @if ($sort == 'date') 
                            @if ($direction == 'asc')
                                <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                            @else
                                <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                            @endif
                        @else
                            <i class="fas fa-sort float-right mt-1"></i>
                        @endif
                    </th>
                    <th scope="col" class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="order('start_time')">
                        Inicio
                        @if ($sort == 'start_time') 
                                @if ($direction == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                    </th>
                    <th scope="col" class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="order('end_time')">
                        Fin
                        @if ($sort == 'end_time') 
                                @if ($direction == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                    </th>
                    <th scope="col" class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="order('hour')">
                        Tiempo
                        @if ($sort == 'hour') 
                            @if ($direction == 'asc')
                                <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                            @else
                                <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                            @endif
                        @else
                            <i class="fas fa-sort float-right mt-1"></i>
                        @endif
                    </th>
                    <th scope="col" class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="order('name')">
                        Cliente
                        @if ($sort == 'name') 
                            @if ($direction == 'asc')
                                <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                            @else
                                <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                            @endif
                        @else
                            <i class="fas fa-sort float-right mt-1"></i>
                        @endif
                    </th>
                    <th scope="col" class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="order('name')">
                        Cuenta
                        @if ($sort == 'name') 
                            @if ($direction == 'asc')
                                <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                            @else
                                <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                            @endif
                        @else
                            <i class="fas fa-sort float-right mt-1"></i>
                        @endif
                    </th>
                    <th scope="col" class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="order('name')">
                        Periodo
                        @if ($sort == 'name') 
                            @if ($direction == 'asc')
                                <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                            @else
                                <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                            @endif
                        @else
                            <i class="fas fa-sort float-right mt-1"></i>
                        @endif
                    </th>
                    <th scope="col" class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="order('name')">
                        C_costo
                        @if ($sort == 'name') 
                            @if ($direction == 'asc')
                                <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                            @else
                                <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                            @endif
                        @else
                            <i class="fas fa-sort float-right mt-1"></i>
                        @endif
                    </th>
                    <th scope="col" class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="order('name')">
                        Descripción
                        @if ($sort == 'name') 
                            @if ($direction == 'asc')
                                <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                            @else
                                <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                            @endif
                        @else
                            <i class="fas fa-sort float-right mt-1"></i>
                        @endif
                    </th>
                    <th scope="col" class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="order('name')">
                        Avance
                        @if ($sort == 'name') 
                            @if ($direction == 'asc')
                                <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                            @else
                                <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                            @endif
                        @else
                            <i class="fas fa-sort float-right mt-1"></i>
                        @endif
                    </th>
                    <th scope="col" class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="order('name')">
                        Observaciones Revisión
                        @if ($sort == 'name') 
                            @if ($direction == 'asc')
                                <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                            @else
                                <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                            @endif
                        @else
                            <i class="fas fa-sort float-right mt-1"></i>
                        @endif
                    </th>
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Opciones</span>
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($binnacles as $binnacle)
                    <tr>
                        <td class="px-6 py-1 ">
                            <div class="text-xs text-gray-900">
                                {{$binnacle->date->format('d/m/y')}}
                            </div>
                        </td>
                        <td class="px-6 py-1 ">
                            <div class="text-xs text-gray-900">
                                {{$binnacle->start_time->format('h:m a')}}
                            </div>
                        </td>
                        <td class="px-6 py-1 ">
                            <div class="text-xs text-gray-900">
                                {{$binnacle->end_time->format('h:m a')}}
                            </div>
                        </td>
                        <td class="px-6 py-1 ">
                            <div class="text-xs text-gray-900">
                                {{$binnacle->hour}}
                            </div>
                        </td>
                        <td class="px-6 py-1 ">
                            <div class="text-xs text-gray-900">
                                {{$binnacle->client_id}}
                            </div>
                        </td>
                        <td class="px-6 py-1 ">
                            <div class="text-xs text-gray-900">
                                {{$binnacle->category_id}}
                            </div>
                        </td>
                        <td class="px-6 py-1 ">
                            <div class="text-xs text-gray-900">
                                {{$binnacle->period->formatLocalized('%b-%Y')}}
                            </div>
                        </td>
                        <td class="px-6 py-1 ">
                            <div class="text-xs text-gray-900">
                                {{$binnacle->service_id}}
                            </div>
                        </td>
                        <td class="px-6 py-1 ">
                            <div class="text-xs text-gray-900">
                                {{$binnacle->description}}
                            </div>
                        </td>
                        <td class="px-6 py-1 ">
                            <div class="text-xs text-gray-900">
                                {{$binnacle->status}}
                            </div>
                        </td>
                        <td class="px-6 py-1 ">
                            <div class="text-xs text-gray-900">
                                No se tiene observaciones
                            </div>
                        </td>
                        <td class="px-4 py-0 text-xs font-medium">                            
                            <x-jet-dropdown>
                                <x-slot name="trigger">
                                    <button class="cursor-pointer px-6 py-2 text-xs text-blue-500">Opciones</button>
                                </x-slot>
                                <x-slot name="content">
                                    <x-jet-dropdown-link class="cursor-pointer pl-6 pr-16 py-2 text-xs text-green-500" wire:click="ModalEditBinnacle({{ $binnacle->id }})">
                                        {{ __('Edit') }}
                                    </x-jet-dropdown-link>
                                    <x-jet-dropdown-link class="cursor-pointer pl-6 pr-16 py-2 text-xs text-red-500" wire:click="confirmBinnacleDeletion({{ $binnacle->id }})">
                                        {{ __('Delete') }}
                                    </x-jet-dropdown-link>
                                </x-slot>
                            </x-jet-dropdown>
                        </td> 
                    </tr>
                @endforeach
            </tbody>
        </table>
        @if ($binnacles->hasPages())
            <div class="my-5 mx-3 text-xs">
                {{$binnacles->links('')}}
            </div>
        @endif
     @else
        <div class="w-full text-center mt-4">
            @if ($readyToLoad == false)
                <span class="inline-flex rounded-md shadow-sm">
                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-blue-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Procesando...
                </span>
            @else
                No existe ningun registro coincidente
            @endif
        </div>
    @endif   
    </x-table>
</div>
