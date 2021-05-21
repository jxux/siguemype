<?php

namespace App\Http\Livewire\Binnacle;

use Livewire\Component;

class Reviewers extends Component{

    public $binnacle_id;

    public function render(){
        return view('livewire.binnacle.reviewers');
    }
}
