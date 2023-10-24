<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function animal_list() {
        $animals = Animal::all();
        return response()->json(array('ok' => true, 'animal' => $animals));
        }
}
