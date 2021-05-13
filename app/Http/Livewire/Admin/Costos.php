<?php

namespace App\Http\Livewire\Admin;

use App\Models\System\Binnacles_service;
use Livewire\Component;
use Livewire\WithPagination;

class Costos extends Component{

    use WithPagination;

    public $search;
    public $sort = 'id';
    public $direction = 'desc';
    public $confirmingCostoDeletion = false;
    public $CostoIdBeingDeleted;
    public $CostoIdBeingEdit;

    public $agreeModalCosto = false;
    public $costo, $code, $name;

    public $editModalCosto = false;

    protected $rules = [
        'code' => 'required|unique:Binnacles_services,code|min:3|max:5',
        'name' => 'required',
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function updatingSearch(){
        $this ->resetPage();
    }

    protected $listeners = ['render'];

    public function render(){
        $costos = Binnacles_service::where('name', 'like', '%'. $this->search . '%')
                        ->orderBy($this->sort, $this->direction)
                        ->paginate(10);
        return view('livewire.admin.costos', compact('costos'));
    }

    // Inicio modal - agregar centro de costo
    public function ModalCosto(){
        $this->agreeModalCosto = true;
    }
    public function saveCosto(){
        $this->validate();
        Binnacles_service::create([
            'code' => $this->code,
            'name' => $this->name,
        ]);
        $this->reset(['agreeModalCosto', 'code', 'name']);
        $this->emit('alert', 'success', 'El centro de costo se creo sastisfactoriamente');
    }
    // Fin modal - agregar centro de costo

    
    // Inicio modal - editar centro de costo
    public function ModalEditCosto($costoId){
        $this->editModalCosto = true;
        $this->costo = Binnacles_service::findOrFail($costoId);
        $this->code = $this->costo->code;
        $this->name = $this->costo->name;
    }
    public function updateCosto(){
        $this->validate([
            'code' => 'required|min:3|max:5',
            'name' => 'required',
        ]);
        $costo = Binnacles_service::findOrFail($this->costo->id);

        $costo->update([
            'code' => $this->code,
            'name' => $this->name,
        ]);
        $this->reset('editModalCosto');
        $this->emit('alert', 'success', 'El centro de costo se actualizo sastisfactoriamente');
    }
    // Fin modal - editar centro de costo


    // Inicio modal - eliminar centro de costo
    public function confirmCostoDeletion($costoId){
        $this->confirmingCostoDeletion = true;
        $this->CostoIdBeingDeleted = $costoId;
    }
    public function deleteCosto()    {
        Binnacles_service::find($this->CostoIdBeingDeleted)->delete();
        $this->emit('alert', 'danger', 'El centro de costo ha sido eliminada');
        $this->confirmingCostoDeletion = false;
    }
    // Fin modal - eliminar centro de costo


    public function cancel(){
        $this->reset(['agreeModalCosto','editModalCosto','code', 'name']);
    }

    public function order($sort){
        if ($this->sort = $sort) {
            if ($this->direction == 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
        } else {
            $this->sort = $sort;
        }
    }
}
