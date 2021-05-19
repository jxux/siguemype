<?php

namespace App\Http\Livewire\Binnacle;

use App\CoreJxux\Requests\Inputs\Common\CategoryInput;
use App\CoreJxux\Requests\Inputs\Common\ServiceInput;
use App\CoreJxux\Requests\Inputs\Common\UserInput;
use App\CoreJxux\Requests\Inputs\Common\PersonInput;
use App\Models\System\Binnacle;
use App\Models\System\Binnacles_category;
use App\Models\System\Binnacles_service;
use App\Models\System\Person;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Binnacles extends Component{

    use WithPagination;

    public $columns = 'date', 
           $type ='date' ;
           
    public $search;
    public $sort = 'date';
    public $direction = 'desc';
    public $date;
    public $binnacle,
           $start_time,
           $end_time,
           $client_id,
           $category_id,
           $service_id,
           $period,
           $description,
           $status = 50,
           $client,
           $category,
           $service,
           $user;

    public $readyToLoad = false;
    public $binnacleDescription = false;

    public $agreeModalBinnacle = false;
    public $editModalBinnacle = false;


    protected $rules = [
        'date' => 'required|date',
        'start_time' => 'required',
        'end_time' => 'required',
        'client_id' => 'required',
        'category_id' => 'required',
        'service_id' => 'required',
        'period' => 'required',
        'description' => 'required',
        'status' => 'required|numeric|min:1|max:100',
    ];

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
        $this->date = Carbon::now()->format('Y-m-d');
        $this->period = Carbon::now()->format('Y-m');
    }
    public function saveBinnacle(){
        $this->validate();
        // $data = self::convert([]);
        Binnacle::create([
            'user_id' => auth()->user()->id,
            'client' => PersonInput::set($this->client_id),
            'category' => CategoryInput::set($this->category_id),
            'service' => ServiceInput::set($this->service_id),
            'user' => UserInput::set(auth()->user()->id),
            'date' => $this->date,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            // 'hour' =>  Carbon::parse($this->end_time)->diffInHours($this->start_time),
            'client_id' => $this->client_id,
            'category_id' => $this->category_id,
            'service_id' => $this->service_id,
            'period' => $this->period."-01",
            'description' => $this->description,
            'status' => $this->status,
        ]);
        $this->reset(['agreeModalBinnacle', 'date', 'start_time', 'end_time', 'client_id', 'category_id', 'service_id', 'period', 'description', 'status']);
        $this->emit('alert', 'success', 'El Parte diario se creo sastisfactoriamente');
    }
    // Fin modal - agregar Parte diario


    // Inicio modal - editar Parte diario
    public function ModalEditBinnacle($binnacleId){
        $this->editModalBinnacle = true;
        $this->binnacle = Binnacle::findOrFail($binnacleId);
        $this->date = $this->binnacle->date->format('Y-m-d');
        $this->start_time = $this->binnacle->start_time;
        $this->end_time = $this->binnacle->end_time;
        $this->client_id = $this->binnacle->client_id;
        $this->category_id = $this->binnacle->category_id;
        $this->service_id = $this->binnacle->service_id;
        $this->period = $this->binnacle->period->format('Y-m');
        $this->description = $this->binnacle->description;
        $this->status = $this->binnacle->status;
    }
    public function updateBinnacle(){
        // $this->validate([
        //     'code' => 'required|min:3|max:5',
        //     'name' => 'required',
        // ]);
        $this->validate();

        $binnacle = Binnacle::findOrFail($this->binnacle->id);

        $binnacle->update([
            'date' => $this->date,
            'client' => PersonInput::set($this->client_id),
            'category' => CategoryInput::set($this->category_id),
            'service' => ServiceInput::set($this->service_id),
            'user' => UserInput::set(auth()->user()->id),
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            // 'hour' =>  self::convert($this->start_time, $this->end_time),
            'client_id' => $this->client_id,
            'category_id' => $this->category_id,
            'service_id' => $this->service_id,
            'period' => $this->period."-01",
            'description' => $this->description,
            'status' => $this->status,
        ]);
        $this->reset('editModalBinnacle', 'date', 'start_time', 'end_time', 'client_id', 'category_id', 'service_id', 'period', 'description', 'status');
        $this->emit('alert', 'success', 'El Parte diario se actualizo sastisfactoriamente');
    }
    // Fin modal - editar Parte diario


    public static function convert($start_time, $end_time){
        $tiempo = Carbon::parse($start_time)->diffInMinutes($end_time);
        $time = Carbon::parse($tiempo)->format('H:i'); 
        return $time;
    }


    public function render(){
        $cuentas = Binnacles_category::get();
        $c_costos = Binnacles_service::get();
        $persons = Person::get();

        if($this->readyToLoad){
            $binnacles = Binnacle::where($this->columns, 'like', '%'. $this->search . '%')
                            ->orderBy($this->sort, $this->direction)
                            ->where('user_id',auth()->user()->id)
                            // ->whereBetween('date',[Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])
                            ->paginate(20); 
        }else{
            $binnacles = [];
        }

        return view('livewire.binnacle.binnacles', compact('binnacles', 'cuentas', 'c_costos', 'persons'));
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