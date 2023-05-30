<?php

namespace App\Http\Controllers;

use App\Events\TransferEvent;
use Illuminate\Http\Request;
use App\Models\Zone;
use App\Models\Pharmacy;
use App\Models\Contact;
use App\Models\Product;
use App\Models\ActivityLogF;
use App\Models\RegisterTransfer;
use App\Models\RegisterWorkingday;
use App\Models\User;
use App\Notifications\TransferNotification;
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

    public function activity_store()
    {
        $post = array();
        foreach($_POST as $key => $value) {  //Recibo los valores por POST 
          $post[$key] = $value;  
       }

       if (isset($post['jornada'])) {
            $jornada = 1;
        } else {
            $jornada = 0;
        }

       $activitylg = [
        'idPharmacy' => $post['idPharmacy'],
        'observations' => $post['observation'],
        'jornada' => $jornada
        ];
    
        try {
            DB::beginTransaction();
            $actlg = ActivityLogF::create($activitylg);

            if($jornada == 0){
                for($i=0; $i<count($post['cantidad']); $i ++ ){
                    $detalle = [
                        'idProduct' => $post['muestra_id'][$i],
                        'idActivity' => $actlg->id,
                        'cantidad' => $post['cantidad'][$i],
                        'idPharmacyT' => $post['idPharmacyT'][$i]
                    ];
                    $transfer =RegisterTransfer::create($detalle);
                    // $transfer = [
                    //     'idProduct' => $post['muestra'][$i],
                    //     'cantidad' => $post['cantidad'][$i],
                    //     'idPharmacyT' => $post['pharmat'][$i]
                    // ];

                    
                    event(new TransferEvent($transfer));
                } 
            }else{
                $detallewd = [
                    'idActivity' => $actlg->id,
                    'desde' => $post['desde'],
                    'hasta' => $post['hasta'],
                ];

                RegisterWorkingday::create($detallewd);
            }
                  
            DB::commit();
            return redirect()->route('farmacia.activity')->with('success', 'Registro agregado con exito!.');
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollBack();
            return redirect()->route('farmacia.activity')->with('error', 'Ocurrió un error, por favor intente de nuevo!.');
        }
       
        
    }
}