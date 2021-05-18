<?php

namespace App\Http\Livewire\Binnacle;

use App\Models\System\Binnacle;
use App\Models\System\Binnacles_category;
use App\Models\System\Binnacles_service;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Binnacles extends Component{

    use WithPagination;

    public $columns = 'date';
    public $search;
    public $sort = 'date';
    public $direction = 'desc';
    public $binnacle,
           $description;
    public $readyToLoad = false;
    public $binnacleDescription = false;

    public $agreeModalBinnacle = false;
    public $editModalBinnacle = false;

    public function ModalBinnacleDescription($binnacleId){
        $this->binnacleDescription = true;
        $this->binnacle = Binnacle::findOrFail($binnacleId);
        $this->description = $this->binnacle->description;
    }

    public function updatingSearch(){
        $this ->resetPage();
    }

    public function loadBinnacles(){
        $this->readyToLoad = true;
    }


    // Inicio modal - agregar Parte diario
    public function ModalBinnacle(){
        $this->agreeModalBinnacle = true;
    }
    public function saveBinnacle(){
        $this->validate();
        Binnacle::create([
            // 'code' => $this->code,
            // 'name' => $this->name,
        ]);
        // $this->reset(['agreeModalCosto', 'code', 'name']);
        $this->emit('alert', 'success', 'El Parte diario se creo sastisfactoriamente');
    }
    // Fin modal - agregar Parte diario



    // Inicio modal - editar Parte diario
    public function ModalEditBinnacle($binnacleId){
        $this->editModalBinnacle = true;
        // $this->costo = Binnacle::findOrFail($binnacleId);
        // $this->code = $this->costo->code;
        // $this->name = $this->costo->name;
    }
    public function updateBinnacle(){
        // $this->validate([
        //     'code' => 'required|min:3|max:5',
        //     'name' => 'required',
        // ]);
        // $costo = Binnacles_service::findOrFail($this->costo->id);

        // $costo->update([
        //     'code' => $this->code,
        //     'name' => $this->name,
        // ]);
        $this->reset('editModalCosto');
        $this->emit('alert', 'success', 'El Parte diario se actualizo sastisfactoriamente');
    }
    // Fin modal - editar Parte diario



    public function render(){
        $cuenta = Binnacles_category::get();
        $c_costo = Binnacles_service::get();

        if($this->readyToLoad){
            $binnacles = Binnacle::where($this->columns, 'like', '%'. $this->search . '%')
                            ->orderBy($this->sort, $this->direction)
                            ->whereBetween('date',[Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])
                            ->paginate(20);   
        }else{
            $binnacles = [];
        }

        return view('livewire.binnacle.binnacles', compact('binnacles', 'cuenta', 'c_costo'));
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