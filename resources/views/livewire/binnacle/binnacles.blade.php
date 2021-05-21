<div wire:init="loadBinnacles">
    <div class="px-6 py-2 flex items-center">
        <x-jet-label value="Buscar por: "/>
        <select class="mx-4 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm text-xs" wire:model="columns" id="select2">
            <option value="date">Fecha</option>
            <option value="description">Descripcion</option>
            <option value="period">Periodo</option>
        </select>
        @if ($columns == 'date')
            <x-jet-input type="date" wire:model="search" class="flex-1 mr-4 text-xs"></x-input>
        @elseif($columns == 'period')
            <x-jet-input type="month" wire:model="search" class="flex-1 mr-4 text-xs"></x-input>
        @else
            <x-jet-input type="text" wire:model="search" class="flex-1 mr-4 text-xs" placeholder="Buscar por descripción"></x-input>   
        @endif
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
                                        {!! $truncated !!} <a class="cursor-pointer text-sm text-blue-600" wire:click="ModalBinnacleDescription({{ $binnacle->id }})">Ver más</a>
                                    </div>
                                @endif
                            </td>
                            <td class="px-3 py-1">
                                <div class="text-xs text-gray-900">
                                    @if($binnacle->status == 100)
                                        <span class="border-green-600 border rounded-full py-0 px-4 bg-green-600 text-xs text-white">
                                            Terminado 
                                        </span>
                                    @elseif($binnacle->status <= 99 && $binnacle->status >= 26) 
                                        <span class="border-blue-600 border rounded-full py-0 px-4 bg-blue-600 text-xs text-white">
                                            Pendiente
                                        </span>
                                    @else
                                        <span class="border-red-600 border rounded-full py-0 px-4 bg-red-600 text-xs text-white">
                                            Pendiente
                                        </span>
                                    @endif
                                </div>
                            </td>
                            <td class="px-3 py-1">
                                <div class="text-xs text-gray-900" x-data="{open:false}">
                                    @if (count($binnacle->Commentaries))
                                        <button class="btn btn-blue font-light" @click="open=true">
                                            {{ count($binnacle->Commentaries) }}
                                        </button>
                                        <div x-show="open" @click.away="open = false" class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true"
                                            x-transition:enter="transition ease-out duration-300"
                                            x-transition:enter-start="opacity-0 transform scale-90"
                                            x-transition:enter-end="opacity-100 transform scale-100"
                                            x-transition:leave="transition ease-in duration-300"
                                            x-transition:leave-start="opacity-100 transform scale-100"
                                            x-transition:leave-end="opacity-0 transform scale-90">
                                            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                                                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                                                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                                                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                                        <div class="sm:flex sm:items-start">
                                                            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-green-100 sm:mx-0 sm:h-10 sm:w-10">
                                                                <svg class="h-6 w-6 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                                                </svg>
                                                            </div>
                                                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                                                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Observaciones</h3>
                                                                <div class="mt-2">
                                                                    @foreach ($binnacle->Commentaries as $item)
                                                                    <div class="bg-green-100 mb-3 rounded-md">
                                                                        <div class="flex items-center">
                                                                            <p class="text-sm text-gray-700 m-2 pt-1 flex-1">{{ $item->User->nick_name }}</p>
                                                                            <p class="text-sm text-gray-700 m-2 flex-1">Estado : {{ $item->status }}</p>
                                                                            <p class="text-sm text-gray-700 m-2 text-right">{{ $item->date }}</p>
                                                                        </div> 
                                                                        <div class="bg-green-200 rounded-md">
                                                                            <p class="text-sm text-gray-700 py-2 mx-2">{{ $item->description }}</p>
                                                                        </div> 
                                                                    </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                                        <button @click="open=false" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                                            Cerrar
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        No se tiene observaciones
                                    @endif
                                    <button class="btn btn-green">+</button>
                                        {{-- @livewire('show-post', ['post' => $post]) --}}
                                        {{-- @livewire('binnacle.reviewers') --}}
                                </div>
                            </td>
                            <td class="px-4 py-0 text-xs font-medium">
                                @if(Carbon\Carbon::parse($binnacle->created_at)->diffInMinutes(now()) <= 120)
                                    <button class="btn btn-green" wire:click="ModalEditBinnacle({{ $binnacle->id }})"><i class="far fa-edit"></i></button>
                                @endif
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
                {{-- <div wire:poll class="text-right">
                    {{ now()->isoFormat('D MMMM YYYY, hh:mm A') }}
                </div> --}}
            </div>
        </x-slot>
        <x-slot name="content">
            @if ($agreeModalBinnacle)
                @include('forms.binnacle')
            @endif
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
                {{-- <div wire:poll class="text-right">
                    {{ now()->isoFormat('D MMMM YYYY, hh:mm A') }}
                </div> --}}
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
    {{-- @livewire('binnacle.reviewers', ['binnacle_id' => $binnacles]) --}}
</div>
