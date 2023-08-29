<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;
use App\Models\City;
use App\Models\Medical;
use App\Models\Zone;
use App\Models\Medicine_category;

class ComboController extends Controller
{
    public function ciudad_d($stateId)
    {
        $cities = City::where('idState', $stateId)->get();
        return response()->json($cities);
    }
    public function zona_d($cityId)
    {
        $zones = Zone::where('idCity', $cityId)->get();
        return response()->json($zones);
    }
    public function estado_d($countryId)
    {
        $estates = State::where('idCountry', $countryId)->get();
        return response()->json($estates);
    }

    public function speciality_d($specialityId)
    {
        $idspecialidad = Medical::where('id', $specialityId)->first();
        $category = Medicine_category::where('idSpeciality', $idspecialidad->idSpecialty)->get();
        return response()->json($category);
    }
}
