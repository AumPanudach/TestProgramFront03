<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $table = 'animal';
    public function pet(){
         return $this->hasMany('App\Models\Pet');
    }
    use HasFactory;
}
