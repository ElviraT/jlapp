<?php

namespace App\Http\Controllers;

use App\Events\TransferEvent;
use Illuminate\Http\Request;
use App\Models\Zone;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\Pharmacy;
use App\Models\Contact;
use App\Models\Product;
use App\Models\ActivityLogF;
use App\Models\RegisterTransfer;
use App\Models\RegisterWorkingday;
use App\Models\User;
use App\Notifications\TransferNotification;
use Illuminate\Support\Facades\DB;
use PDF;

class FarmaciaController extends Controller
{
    public function index()
    {
        $zones = Zone::all();
        $countries = Country::all();
        $states = State::all();
        $cities = City::all();

        return view('farmacia.index', compact('cities', 'countries', 'states', 'zones'));
    }

    public function store(Request $data)
    {
        $data_phar = [
            'name' => $data->name,
            'rif' => $data->rif,
            'sada' => $data->sada,
            'sicm' => $data->sicm,
            'email' => $data->email,
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
        $farmacias = Pharmacy::where('idZone', auth()->user()->UserZone[0]->idZone)->get();
        // $muestras = Product::all();
        $muestras = Product::whereRaw('quantity_tf > quantity_min')->where('available', 1)->get();
        $activities = ActivityLogF::all();
        return view('actividad_log.index', compact('activities', 'farmacias', 'muestras'));
    }

    public function activity_store()
    {
        $post = array();
        foreach ($_POST as $key => $value) {  //Recibo los valores por POST 
            $post[$key] = $value;
        }

        if (isset($post['jornada'])) {
            $jornada = 1;
            $pedido = null;
        } else {
            $jornada = 0;
            $pedido = 'LA' . date('m/d/y/h/i', time());
        }

        $activitylg = [
            'idPharmacy' => $post['idPharmacy'],
            'observations' => $post['observation'],
            'jornada' => $jornada,
            'pedido' => $pedido,
        ];

        try {
            DB::beginTransaction();
            $actlg = ActivityLogF::create($activitylg);

            if ($jornada == 0) {
                for ($i = 0; $i < count($post['cantidad']); $i++) {
                    $detalle = [
                        'idProduct' => $post['muestra_id'][$i],
                        'idActivity' => $actlg->id,
                        'cantidad' => $post['cantidad'][$i],
                        'idPharmacyT' => $post['idPharmacyT'][$i],
                        'muestra' => $post['muestra'][$i],
                        'pharmacy' => $post['pharmat'][$i]
                    ];
                    $transfer = RegisterTransfer::create($detalle);
                    $product = Product::find($post['muestra_id'][$i]);
                    // dd($product);
                    $product->update(['quantity_tf' => DB::raw('quantity_tf - ' . $post['cantidad'][$i])]);

                    event(new TransferEvent($transfer));
                }
            } else {
                $detallewd = [
                    'idActivity' => $actlg->id,
                    'desde' => $post['desde'],
                    'hasta' => $post['hasta'],
                ];

                RegisterWorkingday::create($detallewd);
            }

            DB::commit();
            if ($jornada == 0) {
                return redirect()->route('farmacia.activity', ['id' => $actlg->id])->with('success', 'Registro agregado con exito, su factura se esta generando.');
            } else {
                return redirect()->route('farmacia.activity')->with('success', 'Registro agregado con exito!.');
            }
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollBack();
            return redirect()->route('farmacia.activity')->with('error', 'Ocurrió un error, por favor intente de nuevo!.');
        }
    }

    public function list()
    {
        $zones = Zone::all();
        $pharmacies = Pharmacy::where('idZone', auth()->user()->UserZone[0]->idZone)->where('status', 1)->get();
        return view('list_farmacia.index', compact('pharmacies', 'zones'));
    }

    public function edit(Pharmacy $farmacium)
    {
        $contacto = Contact::where('idPharmacy', $farmacium->id)->first();
        return response()->json([$farmacium, $contacto]);
        //
    }
    public function update(Request $data)
    {
        $data_phar = [
            'name' => $data->name,
            'rif' => $data->rif,
            'sada' => $data->sada,
            'sicm' => $data->sicm,
            'email' => $data->email,
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
        if ($data->status == 'on') {
            $status = 1;
        } else {
            $status = 0;
        }
        try {
            DB::beginTransaction();

            $array    = array('status' => $status);
            $resultado = array_merge($data_phar, $array);

            $pharmacy = Pharmacy::find($data->id);
            $pharmacy->update($resultado);

            $contact = Contact::where('idPharmacy', $data->id);
            $contact->update($data_contact);
            DB::commit();
            return redirect()->route('list_farmacia.index')->with('success', 'Farmacia actualizada con exito!.');
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollBack();
            return redirect()->route('list_farmacia.index')->with('error', 'Ocurrió un error, por favor intente de nuevo!.');
        }
    }
}
