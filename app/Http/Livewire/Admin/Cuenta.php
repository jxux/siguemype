<?php

namespace App\Http\Livewire\Admin;

use App\Models\System\Binnacles_category;
use Livewire\Component;
use Livewire\WithPagination;

class Cuenta extends Component{

    use WithPagination;

    public $search;
    public $sort = 'id';
    public $direction = 'desc';
    public $confirmingCuentaDeletion = false;
    public $CuentaIdBeingDeleted;
    public $CuentaIdBeingEdit;

    public $agreeModalCuenta = false;
    public $cuenta, $code, $name;

    public $editModalCuenta = false;


    protected $rules = [
        'code' => 'required|unique:Binnacles_categories,code|min:3|max:5',
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
        $cuentas = Binnacles_category::where('name', 'like', '%'. $this->search . '%')
                        ->orderBy($this->sort, $this->direction)
                        ->paginate(10);
        return view('livewire.admin.cuenta', compact('cuentas'));
    }


    // Inicio modal - agregar cuenta
    public function ModalCuenta(){
        $this->agreeModalCuenta = true;
    }
    public function saveCuenta(){
        $this->validate();
        Binnacles_category::create([
            'code' => $this->code,
            'name' => $this->name,
        ]);
        $this->reset(['agreeModalCuenta', 'code', 'name']);
        $this->emit('alert', 'success', 'La cuenta se creo sastisfactoriamente');
    }
    // Fin modal - agregar cuenta


    // Inicio modal - editar cuenta
    public function ModalEditCuenta($cuentaId){
        $this->editModalCuenta = true;
        $this->cuenta = Binnacles_category::findOrFail($cuentaId);
        $this->code = $this->cuenta->code;
        $this->name = $this->cuenta->name;
    }
    public function updateCuenta(){
        $this->validate([
            'code' => 'required|min:3|max:5',
            'name' => 'required',
        ]);
        $cuenta = Binnacles_category::findOrFail($this->cuenta->id);

        $cuenta->update([
            'code' => $this->code,
            'name' => $this->name,
        ]);
        $this->reset('editModalCuenta');
        $this->emit('alert', 'success', 'La cuenta se actualizo sastisfactoriamente');
    }
    // Fin modal - editar cuenta


    // Inicio modal - eliminar cuenta
    public function confirmCuentaDeletion($cuentaId){
        $this->confirmingCuentaDeletion = true;
        $this->CuentaIdBeingDeleted = $cuentaId;
    }
    public function deleteCuenta()    {
        Binnacles_category::find($this->CuentaIdBeingDeleted)->delete();
        $this->emit('alert', 'danger', 'La cuenta ha sido eliminada');
        $this->confirmingCuentaDeletion = false;
    }
    // Fin modal - eliminar cuenta

    
    public function cancel(){
        $this->reset(['agreeModalCuenta','editModalCuenta','code', 'name']);
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
