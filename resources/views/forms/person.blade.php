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