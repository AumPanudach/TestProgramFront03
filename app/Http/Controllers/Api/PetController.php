<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pet;
use App\Models\Animal;

class PetController extends Controller
{
    public function pet_list($Animal_id = null) {
        if($Animal_id) {
            $pets = Pet::where('animal_id', $Animal_id)->get();
            } else {
            $pets = Pet::all();
            }
        return response()->json(array ( 'ok' => true,
        'pets' => $pets,
        ));
        }



        public function pet_search(Request $request) {
            $query = $request->input('query');
            if($query) {
           $pets = Pet::where('name_pet', 'like', '%'.$query.'%')->get();
            } else {
           $pets = Pet::all();
            }
            
            return response()->json(array( 'ok' => true,
            'pets' =>$pets,
            ));
            }
}
