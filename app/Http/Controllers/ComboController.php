<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;
use App\Models\City;
use App\Models\Medical;
use App\Models\Zone;
use App\Models\Medicine_category;
use Illuminate\Support\Facades\DB;

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
        $products = DB::table('products')
            ->join('medicine_categories', 'products.idCategory', '=', 'medicine_categories.id')
            ->select('products.id', 'products.name')
            ->where('medicine_categories.idSpeciality',  $idspecialidad->idSpecialty)
            ->get();

        return response()->json($products);
    }
}
