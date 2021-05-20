<div wire:init="loadBinnacles">
    <div class="px-6 py-2 flex items-center">
        <x-jet-label value="Buscar por: "/>
        <select class="mx-4 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm text-xs" wire:model="columns" id="select2">
            <option value="date">Fecha</option>
            <option value="description">Descripcion</option>
            <option value="period">Periodo</option>
        </select>
        <x-jet-input type="{{$type}}" wire:model="search" class="flex-1 mr-4 text-xs" placeholder="Buscar por centro de costo"></x-input>
        <x-jet-button wire:click="ModalBinnacle">
            Añadir
        </x-jet-button>
    </div>
    <x-table>
        @if (count($binnacles))
            <table class="min-w-full divide-y divide-gray-200 mx-1">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="w-24 cursor-pointer px-3 py-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="order('date')">
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
                        <th scope="col" class="w-24 cursor-pointer px-3 py-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="order('start_time')">
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
                        <th scope="col" class="w-24 cursor-pointer px-3 py-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="order('end_time')">
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
                        <th scope="col" class="w-24 cursor-pointer px-3 py-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="order('hour')">
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
                        <th scope="col" class="w-24 cursor-pointer px-3 py-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="order('client_id')">
                            Cliente
                            @if ($sort == 'client_id') 
                                @if ($direction == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                        </th>
                        <th scope="col" class="w-24 cursor-pointer px-3 py-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="order('category_id')">
                            Cuenta
                            @if ($sort == 'category_id') 
                                @if ($direction == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                        </th>
                        <th scope="col" class="w-26 cursor-pointer px-3 py-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="order('period')">
                            Periodo
                            @if ($sort == 'period') 
                                @if ($direction == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                        </th>
                        <th scope="col" class="w-32 cursor-pointer px-3 py-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="order('service_id')">
                            C_costo
                            @if ($sort == 'service_id') 
                                @if ($direction == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                        </th>
                        <th scope="col" class="cursor-pointer px-3 py-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="order('description')">
                            Descripción
                            @if ($sort == 'description') 
                                @if ($direction == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                        </th>
                        <th scope="col" class="w-28 cursor-pointer px-3 py-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="order('status')">
                            Avance
                            @if ($sort == 'status') 
                                @if ($direction == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                        </th>
                        <th scope="col" class="w-28 cursor-pointer px-3 py-1 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Observaciones | Revisión
                        </th>
                        <th scope="col" class="relative px-3 py-3">
                            <span class="sr-only">Opciones</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($binnacles as $binnacle)
                        <tr>
                            <td class="px-3 py-0">
                                <div class="text-xs text-gray-900">
                                    {{$binnacle->date->isoFormat('D/MM/YYYY')}}
                                </div>
                            </td>
                            <td class="px-3 py-0">
                                <div class="text-xs text-gray-900">
                                    {{$binnacle->start_time->isoFormat('hh:mm a')}}
                                </div>
                            </td>
                            <td class="px-3 py-0">
                                <div class="text-xs text-gray-900">
                                    {{$binnacle->end_time->isoFormat('hh:mm a')}}
                                </div>
                            </td>
                            <td class="px-3 py-0">
                                <div class="text-xs text-gray-900">
                                    {{$binnacle->hour}}
                                </div>
                            </td>
                            <td class="px-3 py-0">
                                <div class="text-xs text-gray-900">
                                    {{ $binnacle->Person->internal_code }}-{{ $binnacle->Person->name }}
                                </div>
                            </td>
                            <td class="px-3 py-0">
                                <div class="text-xs text-gray-900">
                                    {{ $binnacle->Binnacles_category->code }}-{{$binnacle->Binnacles_category->name}}
                                </div>
                            </td>
                            <td class="px-3 py-0">
                                <div class="text-xs text-gray-900">
                                    {{$binnacle->period->formatLocalized('%b-%Y')}}
                                </div>
                            </td>
                            <td class="px-3 py-0">
                                <div class="text-xs text-gray-900">
                                    {{$binnacle->Binnacles_Service->code}}-{{$binnacle->Binnacles_Service->name}}
                                </div>
                            </td>
                            <td class="px-3 py-0">
                                @php
                                    $truncated = Str::limit($binnacle->description, 25);
                                    $tr = Str::length($truncated)
                                @endphp
                                @if ($tr <= 25)
                                    <div class="text-xs text-gray-900">
                                        {!!$truncated!!}
                                    </div>
                                @else
                                    <div class="text-xs text-gray-900">
                                        {!! $truncated !!}
                                        <a class="cursor-pointer text-sm text-blue-600" wire:click="ModalBinnacleDescription({{ $binnacle->id }})">
                                            Ver más
                                        </a>
                                    </div>
                                @endif
                            </td>
                            <td class="px-3 py-1">
                                <div class="text-xs text-gray-900">
                                    @if($binnacle->status == 100)
                                        <span class="border-green-600 border rounded-full py-0 px-4 bg-green-600 text-xs text-white">
                                            Terminado 
                                        </span>
                                    @elseif($binnacle->status <= 99 && $binnacle->status >= 25) 
                                        <span class="border-blue-600 border rounded-full py-0 px-4 bg-blue-600 text-xs text-white">
                                            Pendiente
                                        </span>
                                    @else
                                        <span class="border-red-600 border rounded-full py-0 px-4 bg-red-600 text-xs text-white">
                                            Pendiente
                                        </span>
                                    @endif
                                    {{-- {{$binnacle->status}} --}}
                                </div>
                            </td>
                            <td class="px-3 py-0">
                                <div class="text-xs text-gray-900">
                                    @if (count($binnacle->Commentaries))
                                        @foreach ($binnacle->Commentaries as $Commentary)
                                            {{ $Commentary->description }}
                                        @endforeach
                                    @else
                                        No se tiene observaciones
                                    @endif
                                </div>
                            </td>
                            <td class="px-4 py-0 text-xs font-medium">
                                <button class="btn btn-green" wire:click="ModalEditBinnacle({{ $binnacle->id }})"><i class="far fa-edit"></i></button>
                                {{-- <x-jet-dropdown>
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
                                </x-jet-dropdown> --}}
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

    {{-- Modal vista descripcion --}}
    <x-jet-dialog-modal wire:model="binnacleDescription">
        <x-slot name="title">
        </x-slot>
        <x-slot name="content">
            <p>
                {!! $description !!}
                {{-- {{ $date }} --}}
            </p>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('binnacleDescription')" wire:loading.attr="disabled">
                {{ __('Close') }}
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>

    {{-- Modal Agregar Parte diario --}}
    <x-jet-dialog-modal wire:model="agreeModalBinnacle">
        <x-slot name="title">
            <div class="font-semibold flex items-center">
                <p class="flex-1"> Nuevo evento <p/> 
                <div wire:poll class="text-right">
                    {{ now()->isoFormat('D MMMM YYYY, hh:mm A') }}
                </div>
            </div>
        </x-slot>
        <x-slot name="content">
            @include('forms.binnacle')
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('agreeModalBinnacle')" wire:loading.attr="disabled">
                {{ __('Close') }}
            </x-jet-secondary-button>
            <x-jet-button wire:click="saveBinnacle()" wire:loading.attr="disabled" wire:target="save" class="disabled:opacity-25">
                {{ __('Register') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

    {{-- Modal Editar Parte diario --}}
    <x-jet-dialog-modal wire:model="editModalBinnacle">
        <x-slot name="title">
            <div class="font-semibold flex items-center">
                <p class="flex-1"> Editar evento <p/> 
                <div wire:poll class="text-right">
                    {{ now()->isoFormat('D MMMM YYYY, hh:mm A') }}
                </div>
            </div>
        </x-slot>
        <x-slot name="content">
            @include('forms.binnacle')
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('editModalBinnacle')" wire:loading.attr="disabled">
                {{ __('Close') }}
            </x-jet-secondary-button>
            <x-jet-button wire:click="updateBinnacle()" wire:loading.attr="disabled" wire:target="save" class="disabled:opacity-25">
                {{ __('Update') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
