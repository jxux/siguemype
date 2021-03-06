<div>
    <div class="px-4 py-2 flex items-center">
        <p class="font-bold uppercase ">Centros de costos </p>
    </div>
    <div class="px-6 py-2 flex items-center">
        <x-jet-input type="text" wire:model="search" class="flex-1 mr-4 text-xs" placeholder="Buscar por centro de costo"></x-input>
        <x-jet-button wire:click="ModalCosto">
            Crear nuevo centro de costo
        </x-jet-button>
    </div>

    <x-table>
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
                    <th scope="col" class="cursor-pointer px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider" wire:click="order('code')">
                        Código
                        @if ($sort == 'code') 
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
                    <th scope="col" class="relative px-6 py-3">
                        <span class="sr-only">Editar</span>
                    </th>
                </tr>
            </thead>
            @if ($costos->count())
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($costos as $costo)               
                        <tr>
                            <td class="px-6 py-0 ">
                                <div class="text-xs text-gray-900">
                                    {{$costo->id}}
                                </div>
                            </td>
                            <td class="px-6 py-0">
                                <div class="text-xs text-gray-900">
                                    {{$costo->code}}
                                </div>
                            </td>
                            <td class="px-6 py-0">
                                <div class="text-xs text-gray-900">
                                    {{$costo->name}}
                                </div>
                            </td>
                            <td class="px-4 py-0 text-xs font-medium">
                                <x-jet-dropdown>
                                    <x-slot name="trigger">
                                        <button class="cursor-pointer px-6 py-2 text-xs text-blue-500">Opciones</button>
                                    </x-slot>
                                    <x-slot name="content">
                                        <x-jet-dropdown-link class="cursor-pointer pl-6 pr-16 py-2 text-xs text-green-500" wire:click="ModalEditCosto({{ $costo->id }})">
                                            {{ __('Edit') }}
                                        </x-jet-dropdown-link>
                                        <x-jet-dropdown-link class="cursor-pointer pl-6 pr-16 py-2 text-xs text-red-500" wire:click="confirmCostoDeletion({{ $costo->id }})">
                                            {{ __('Delete') }}
                                        </x-jet-dropdown-link>
                                    </x-slot>

                                </x-jet-dropdown>

                            </td>                           
                        </tr>
                    @endforeach
                </tbody>
            @else
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-1 text-center" colspan="4">
                            No existe ningun registro coincidente
                        </td>
                    </tr>
                </tbody>
            @endif
        </table>
    </x-table>
    @if ($costos->hasPages())
        <div class="my-5 mx-3 text-xs">
            {{$costos->links('')}}
        </div>
    @endif


    <!-- Modal Agregar Centro de costo -->
    <x-jet-dialog-modal wire:model="agreeModalCosto">
        <x-slot name="title">
            Crear centro de costo
        </x-slot>
        <x-slot name="content">
            <div class="mb-4" >
                <x-jet-label value="Codigo"/>
                <x-jet-input type="text" class="w-full" wire:model="code"></x-jet-input>
                <x-jet-input-error for="code"/>
            </div>
            <div class="mb-4" >
                <x-jet-label value="Nombre del centro de costo"/>
                <x-jet-input type="text" class="w-full" wire:model.defer="name"></x-jet-input>
                <x-jet-input-error for="name"/>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('agreeModalCosto')" wire:loading.attr="disabled">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-button wire:click="saveCosto()" wire:loading.attr="disabled" wire:target="save" class="disabled:opacity-25">
                Crear centro de costo
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

    <!-- Modal Editar Centro de costo -->
    <x-jet-dialog-modal wire:model="editModalCosto">
        <x-slot name="title">
            Editar centro de costo
        </x-slot>
        <x-slot name="content">
            <div class="mb-4" >
                <x-jet-label value="Codigo"/>
                <x-jet-input type="text" class="w-full" wire:model="code"></x-jet-input>
                <x-jet-input-error for="code"/>
            </div>
            <div class="mb-4" >
                <x-jet-label value="Nombre del centro de costo"/>
                <x-jet-input type="text" class="w-full" wire:model.defer="name"></x-jet-input>
                <x-jet-input-error for="name"/>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="cancel()" wire:loading.attr="disabled">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-button wire:click="updateCosto()" wire:loading.attr="disabled" wire:target="save" class="disabled:opacity-25">
                Actualizar centro de costo
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

    <!-- Borrar Centro de costo -->
    <x-jet-confirmation-modal wire:model="confirmingCostoDeletion">
        <x-slot name="title">
            Elimnar centro de costo
        </x-slot>

        <x-slot name="content">
            ¿Está seguro de que desea eliminar esta el centro de costo?
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('confirmingCostoDeletion')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="deleteCosto" wire:loading.attr="disabled">
                {{ __('Delete') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>
</div>
