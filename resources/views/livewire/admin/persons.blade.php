<div wire:init="loadPersons">
    <div class="px-6 py-2 flex items-center">
        <x-jet-label value="Buscar por: "/>
        <select class="mx-4 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm text-xs" wire:model="columns">
            <option value="internal_code">Código</option>
            <option value="number">Número</option>
            <option value="name">Nombre</option>
        </select>
        <x-jet-input type="text" wire:model="search" class="flex-1 mr-4 text-xs" placeholder="Buscar"></x-input>
        <x-jet-button wire:click="ModalPerson">
            Añadir cliente
        </x-jet-button>
    </div>
    <x-table>
        @if (count($persons))
            <table class="min-w-full divide-y divide-gray-200 mx-1">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="w-24 cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="order('id')">
                            ID
                            @if ($sort == 'id') 
                                @if ($direction == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                        </th>
                        <th scope="col" class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="order('internal_code')">
                            Código
                            @if ($sort == 'internal_code') 
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif
                        </th>
                        <th scope="col" class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="order('number')">
                            Número
                            @if ($sort == 'number') 
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
                            Nombre
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
                    @foreach ($persons as $person)
                        <tr>
                            <td class="px-6 py-1 ">
                                <div class="text-xs text-gray-900">
                                    {{$person->id}}
                                </div>
                            </td>
                            <td class="px-6 py-1 ">
                                <div class="text-xs text-gray-900">
                                    {{$person->internal_code}}
                                </div>
                            </td>
                            <td class="px-6 py-1 ">
                                <div class="text-xs text-gray-900">
                                    {{$person->number}}
                                </div>
                            </td>
                            <td class="px-6 py-1 ">
                                <div class="text-xs text-gray-900">
                                    {{$person->name}}
                                </div>
                            </td>
                            <td class="px-4 py-0 text-xs font-medium">                            
                                <x-jet-dropdown>
                                    <x-slot name="trigger">
                                        <button class="cursor-pointer px-6 py-2 text-xs text-blue-500">Opciones</button>
                                    </x-slot>
                                    <x-slot name="content">
                                        <x-jet-dropdown-link class="cursor-pointer pl-6 pr-16 py-2 text-xs text-green-500" wire:click="ModalEditPerson({{ $person->id }})">
                                            {{ __('Edit') }}
                                        </x-jet-dropdown-link>
                                        <x-jet-dropdown-link class="cursor-pointer pl-6 pr-16 py-2 text-xs text-red-500" wire:click="confirmPersonDeletion({{ $person->id }})">
                                            {{ __('Delete') }}
                                        </x-jet-dropdown-link>
                                    </x-slot>
                                </x-jet-dropdown>
                            </td> 
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if ($persons->hasPages())
                <div class="my-5 mx-3 text-xs">
                    {{$persons->links('')}}
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

    <!-- Modal Agregar Cliente -->
    <x-jet-dialog-modal wire:model="agreeModalPerson">
        <x-slot name="title">
            Nuevo Cliente
        </x-slot>
        <x-slot name="content">
            <div class="grid grid-cols-3 gap-4">
                <div class="mb-4" >
                    <x-jet-label value="Código"/>
                    <x-jet-input type="text" class="w-full text-xs" wire:model="internal_code"></x-jet-input>
                    <x-jet-input-error for="internal_code"/>
                </div>
                <div class="mb-4" >
                    <x-jet-label value="Tipo Doc. Identidad"/>
                    <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm text-xs" wire:model="identity_document_type_id">
                        @foreach ($identity_document_types as $identity_document_type)
                            <option value="{{$identity_document_type->id}}">{{$identity_document_type->description}}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="identity_document_type_id"/>
                </div>
                <div class="mb-4" >
                    <x-jet-label value="Número"/>
                    <x-jet-input type="text" class="w-full text-xs" wire:model.defer="number"></x-jet-input>
                    <x-jet-input-error for="number"/>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="mb-4" >
                    <x-jet-label value="Nombre"/>
                    <x-jet-input type="text" class="w-full text-xs" wire:model="name"></x-jet-input>
                    <x-jet-input-error for="name"/>
                </div>
                <div class="mb-4" >
                    <x-jet-label value="Nombre comercial"/>
                    <x-jet-input type="text" class="w-full text-xs" wire:model.defer="trade_name"></x-jet-input>
                    <x-jet-input-error for="trade_name"/>
                </div>
            </div>

            <div class="grid grid-cols-3 gap-4">
                <div class="mb-4">
                    <x-jet-label value="País"/>
                    <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm text-xs" wire:model="country_id">
                        @foreach ($countries as $countrie)
                            <option class="truncate" value="{{$countrie->id}}">{{$countrie->description}}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="country_id"/>
                </div>
                <div class="mb-4">
                    <x-jet-label value="Departamento"/>
                    <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm text-xs" wire:model="department_id">
                        @foreach ($departments as $department)
                            <option value="{{$department->id}}">{{$department->description}}</option>
                        @endforeach
                    </select>
                    <x-jet-input-error for="department_id"/>
                </div>
                <div class="mb-4">
                    <x-jet-label value="Provincia"/>
                    <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm text-xs" wire:model="province_id">
                        @if ($department_id)
                            @foreach ($provinces as $province)
                                <option value="{{$province->id}}">{{$province->description}}</option>
                            @endforeach
                        @else
                            <option value="">Seleccione un Departamento</option>
                        @endif
                    </select>
                    <x-jet-input-error for="province_id"/>
                </div>
            </div>

            <div class="grid grid-cols-3 gap-4">
                <div class="mb-4">
                    <x-jet-label value="Distrito"/>
                    <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm text-xs" wire:model="district_id">
                        @if ($province_id)
                            @foreach ($districts as $district)
                                <option value="{{$district->id}}">{{$district->description}}</option>
                            @endforeach
                        @else
                            <option value="">Seleccione una Provincia</option>
                        @endif
                    </select>
                    <x-jet-input-error for="district_id"/>
                </div>
                <div class="mb-4 col-span-2">
                    <x-jet-label value="Dirección"/>
                    <x-jet-input type="text" class="w-full text-xs" wire:model="address"></x-jet-input>
                    <x-jet-input-error for="address"/>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="mb-4" >
                    <x-jet-label value="Teléfono"/>
                    <x-jet-input type="text" class="w-full text-xs" wire:model="telephone"></x-jet-input>
                    <x-jet-input-error for="telephone"/>
                </div>
                <div class="mb-4" >
                    <x-jet-label value="Correo electrónico"/>
                    <x-jet-input type="text" class="w-full text-xs" wire:model.defer="email"></x-jet-input>
                    <x-jet-input-error for="email"/>
                </div>
            </div>

        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('agreeModalPerson')" wire:loading.attr="disabled">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-button wire:click="savePerson()" wire:loading.attr="disabled" wire:target="save" class="disabled:opacity-25">
                Añadir cliente
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>