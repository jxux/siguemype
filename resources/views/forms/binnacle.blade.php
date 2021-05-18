<div class="grid grid-cols-3 gap-4">
    <div class="mb-4">
        <x-jet-label value="Fecha"/>
        <x-jet-input type="date" class="w-full text-xs" wire:model="date"></x-jet-input>
        <x-jet-input-error for="date"/>
    </div>
    <div class="mb-4">
        <x-jet-label value="Hora de inicio"/>
        <x-jet-input type="time" class="w-full text-xs" wire:model="start_time"></x-jet-input>
        <x-jet-input-error for="start_time"/>
    </div>
    <div class="mb-4">
        <x-jet-label value="Hora de fin"/>
        <x-jet-input type="time" class="w-full text-xs" wire:model="end_time"></x-jet-input>
        <x-jet-input-error for="end_time"/>
    </div>
</div>

<div class="grid grid-cols-1 gap-4">
    <div class="mb-4">
        <x-jet-label value="Cliente"/>
        <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm text-xs" wire:model="client_id">
            @foreach ($persons as $person)
                <option value="{{$person->id}}">{{$person->internal_code}} - {{$person->name}}</option>
            @endforeach
        </select>
        <x-jet-input-error for="client_id"/>
    </div>
</div>

<div class="grid grid-cols-3 gap-4">
    <div class="mb-4">
        <x-jet-label value="Cuenta"/>
        <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm text-xs" wire:model="category_id">
            @foreach ($cuentas as $cuenta)
                <option value="{{$cuenta->id}}">{{$cuenta->code}} - {{$cuenta->name}}</option>
            @endforeach
        </select>
        <x-jet-input-error for="category_id"/>
    </div>

    <div class="mb-4">
        <x-jet-label value="Centro de Costos"/>
        <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm text-xs" wire:model="service_id">
            @foreach ($c_costos as $c_costo)
                <option value="{{$c_costo->id}}">{{$c_costo->code}} - {{$c_costo->name}}</option>
            @endforeach
        </select>
        <x-jet-input-error for="service_id"/>
    </div>

    <div class="mb-4">
        <x-jet-label value="Fecha"/>
        <x-jet-input type="month" class="w-full text-xs" wire:model="period"></x-jet-input>
        <x-jet-input-error for="period"/>
    </div>
</div>

<div class="grid grid-cols-1 gap-4">
    <div class="mb-4">
        <x-jet-label value="Descripción"/>
        <textarea name="description" type="text" class="form-control w-full" wire:model.defer="description" rows="6"></textarea>
        {{-- <textarea name="description" class="border-2 border-gray-500"></textarea> --}}
        <x-jet-input-error for="description"/>
    </div>
</div>

<div class="grid grid-cols-1 gap-4">
    <div class="mb-4">
        <x-jet-label value="Estado - {{$status}}"/>
        <x-jet-input type="range" step="25" class="w-full form-control text-xs" wire:model="status" list="tickmarks"/>
            <datalist id="tickmarks">
            <option value="0" label="0%">
            <option value="25">
            <option value="50" label="50%">
            <option value="75">
            <option value="100" label="100%">
            </datalist>
        <x-jet-input-error for="status"/>
    </div>
</div>
