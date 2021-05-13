<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Binnacles_category extends Model{   
     
    use HasFactory;

    protected $fillable = ['code', 'name'];
}
