<?php

namespace App\Http\Livewire\Admin;

use App\Models\System\Catalogs\IdentityDocumentType;
use App\Models\System\CatIdentityDocumentTypes;
use App\Models\System\Person;
use Livewire\Component;
use Livewire\WithPagination;

class Persons extends Component{

    use WithPagination;

    public $columns = 'name';
    public $search;
    public $sort = 'id';
    public $direction = 'desc';
    public $readyToLoad = false;

    public $identity_document_type_id = '6',
        $number,
        $name,
        $trade_name,
        $country_id = 'PE',
        $department_id,
        $province_id,
        $district_id,
        $address,
        $telephone,
        $condition,
        $state,
        $email,
        $perception_agent = false,
        $percentage_perception,
        $person_type_id,
        $comment,
        $addresses = [];

    public $agreeModalPerson = true;

    public function updatingSearch(){
        $this ->resetPage();
    }

    public function loadPersons(){
        $this->readyToLoad = true;
    }

    public function render(){

        $identity_document_types = IdentityDocumentType::whereActive()->get();

        if($this->readyToLoad){
            $persons = Person::where($this->columns, 'like', '%'. $this->search . '%')
                            ->orderBy($this->sort, $this->direction)
                            ->paginate(20);            
        }else{
            $persons = [];
        }

        return view('livewire.admin.persons', compact('persons', 'identity_document_types'));
    }

    // Inicio modal - agregar Person
    public function ModalPerson(){
        $this->agreeModalPerson = true;
    }
    public function savePerson(){
        // $this->validate();
        Person::create([
            // 'code' => $this->code,
            // 'name' => $this->name,
        ]);
        $this->reset(['agreeModalPerson', 'code', 'name']);
        $this->emit('alert', 'success', 'El cliente se añadio sastisfactoriamente');
    }
    // Fin modal - agregar Person


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
