<?php

namespace App\Http\Livewire\Binnacle;

use App\Models\System\Binnacle;
use App\Models\System\Binnacles_category;
use App\Models\System\Binnacles_service;
use Livewire\Component;
use Livewire\WithPagination;

class Binnacles extends Component{

    use WithPagination;

    // public $columns = 'name';
    public $search;
    public $sort = 'id';
    public $direction = 'desc';
    public $readyToLoad = false;

    public function loadBinnacles(){
        $this->readyToLoad = true;
    }

    public function render(){
        
        $cuenta = Binnacles_category::get();
        $c_costo = Binnacles_service::get();

        if($this->readyToLoad){
            $binnacles = Binnacle::
            // where($this->columns, 'like', '%'. $this->search . '%')
                            // ->
                            orderBy($this->sort, $this->direction)
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