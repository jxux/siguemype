<?php

namespace App\Http\Livewire\Admin;

use App\Models\System\Catalogs\Country;
use App\Models\System\Catalogs\Department;
use App\Models\System\Catalogs\District;
use App\Models\System\Catalogs\IdentityDocumentType;
use App\Models\System\Catalogs\Province;
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
        $internal_code,
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

    public $agreeModalPerson = false;

    public function updatingSearch(){
        $this ->resetPage();
    }

    public function loadPersons(){
        $this->readyToLoad = true;
    }

    public function render(){

        $countries = Country::whereActive()->orderByDescription()->get();
        $departments = Department::whereActive()->orderByDescription()->get();
        $provinces = Province::whereActive()->where('department_id', '=' , $this->department_id)->orderByDescription()->get();
        $districts = District::whereActive()->where('province_id', '=' , $this->province_id)->orderByDescription()->get();
        $locations = $this->getLocationCascade();
        $identity_document_types = IdentityDocumentType::whereActive()->get();

        if($this->readyToLoad){
            $persons = Person::where($this->columns, 'like', '%'. $this->search . '%')
                            ->orderBy($this->sort, $this->direction)
                            ->paginate(20);   
        }else{
            $persons = [];
        }

        return view('livewire.admin.persons', compact('persons', 'identity_document_types', 'countries', 'departments', 'provinces', 'districts', 'locations', 'identity_document_types'));
    }

    // Inicio modal - agregar Person
    public function ModalPerson(){
        $this->agreeModalPerson = true;
    }
    public function savePerson(){
        // $this->validate();
        Person::create([
            'identity_document_type_id' => $this->identity_document_type_id,
            'internal_code' => $this->internal_code,
            'number' => $this->number,
            'name' => $this->name,
            'trade_name' => $this->trade_name,
            'country_id' => $this->country_id,
            'department_id' => $this->department_id,
            'province_id' => $this->province_id,
            'district_id' => $this->district_id,
            'address' => $this->address,
            'telephone' => $this->telephone,
            // 'condition' => $this->condition,
            // 'state' => $this->state,
            'email' => $this->email,
            // 'code' => $this->code,
            // 'name' => $this->name,
        ]);
        $this->reset(['agreeModalPerson', 'internal_code', 'name']);
        $this->emit('alert', 'success', 'El cliente se añadio sastisfactoriamente');
    }
    // Fin modal - agregar Person







    public function getLocationCascade(){
        $locations = [];
        $departments = Department::where('active', true)->get();
        foreach ($departments as $department)
        {
            $children_provinces = [];
            foreach ($department->provinces as $province)
            {
                $children_districts = [];
                foreach ($province->districts as $district)
                {
                    $children_districts[] = [
                        'value' => $district->id,
                        'label' => $district->description
                    ];
                }
                $children_provinces[] = [
                    'value' => $province->id,
                    'label' => $province->description,
                    'children' => $children_districts
                ];
            }
            $locations[] = [
                'value' => $department->id,
                'label' => $department->description,
                'children' => $children_provinces
            ];
        }

        return $locations;
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
