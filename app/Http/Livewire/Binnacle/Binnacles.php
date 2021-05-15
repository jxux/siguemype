<?php

namespace App\Http\Livewire\Binnacle;

use Livewire\Component;
use Livewire\WithPagination;

class Binnacles extends Component{

    use WithPagination;

    public $columns = 'name';
    public $search;
    public $sort = 'id';
    public $direction = 'desc';
    public $readyToLoad = false;

    public function loadPersons(){
        $this->readyToLoad = true;
    }

    public function render(){

        if($this->readyToLoad){
            $persons = Binnacle::where($this->columns, 'like', '%'. $this->search . '%')
                            ->orderBy($this->sort, $this->direction)
                            ->paginate(20);   
        }else{
            $persons = [];
        }

        return view('livewire.binnacle.binnacles');
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
