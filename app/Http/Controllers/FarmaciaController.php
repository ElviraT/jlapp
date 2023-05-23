<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zone;
use App\Models\Pharmacy;
use App\Models\Contact;
use App\Models\Product;
use App\Models\ActivityLogF;
use App\Models\RegisterTransfer;
use App\Models\RegisterWorkingday;
use Illuminate\Support\Facades\DB;

class FarmaciaController extends Controller
{
    public function index()
    {
        $zones = Zone::all();
        return view('farmacia.index', compact('zones'));
    }

    public function store(Request $data)
    {
        $data_phar = [
            'name' => $data->name,
            'rif' => $data->rif,
            'sada' => $data->sada,
            'sicm' => $data->sicm,
            'dicm' => $data->dicm,
            'telefono' => $data->telefono,
            'direccion' => $data->direccion,
            'idZone' => $data->idZone
        ];
        $data_contact = [
            'name' => $data->namec,
            'last_name' => $data->last_name,
            'telephone' => $data->telephone,
            'telephone2' => $data->telephone2
        ];

        try {
            DB::beginTransaction();
            $pharm = Pharmacy::create($data_phar);

            $array2    = array('idPharmacy' => $pharm->id);
            $resultado = array_merge($data_contact, $array2);

            Contact::create($resultado);
            DB::commit();
            return redirect()->route('farmacia.index')->with('success', 'Farmacia agregada con exito!.');
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollBack();
            return redirect()->route('farmacia.index')->with('error', 'Ocurrió un error, por favor intente de nuevo!.');
        }
    }

    public function activity()
    {
        $farmacias = Pharmacy::all();
        $muestras = Product::all();
        $activities= ActivityLogF::all();
        return view('actividad_log.index', compact('activities','farmacias','muestras'));
    }
}