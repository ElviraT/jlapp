<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Specialty;
use App\Models\Zone;
use App\Models\Modality;
use App\Models\Medical;
use App\Models\Timetable;
use App\Models\Activity;
use App\Models\MedicalSample;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class MedicoController extends Controller
{
    public function index()
    {
        $medicals = Medical::all();
        $zones = Zone::all();
        $specialities = Specialty::all();
        $modalities = Modality::all();

        return view('medico.index', compact('zones', 'specialities', 'modalities', 'medicals'));
    }

    public function store(Request $data)
    {
        $data_med = [
            'name' => $data->name,
            'last_name' => $data->last_name,
            'email' => $data->email,
            'idSpecialty' => $data->idSpecialty,
            'idZone' => $data->idZone,
            'idModality' => $data->idModality,
            'numero_colegio' => $data->numero_colegio,
            'matricula' => $data->matricula,
            'direccion' => $data->direccion
        ];
        $data_horario = [
            'monday' => $data->monday,
            'start_time_Mon' => $data->start_time_Mon,
            'end_time_Mon' => $data->end_time_Mon,
            'tuesday' => $data->tuesday,
            'start_time_Tue' => $data->start_time_Tue,
            'end_time_Tue' => $data->end_time_Tue,
            'wednesday' => $data->wednesday,
            'start_time_Wed' => $data->start_time_Wed,
            'end_time_Wed' => $data->end_time_Wed,
            'thursday' => $data->thursday,
            'start_time_Thu' => $data->start_time_Thu,
            'end_time_Thu' => $data->end_time_Thu,
            'friday' => $data->friday,
            'start_time_Fri' => $data->start_time_Fri,
            'end_time_Fri' => $data->end_time_Fri,
            'saturday' => $data->saturday,
            'start_time_Sat' => $data->start_time_Sat,
            'end_time_Sat' => $data->end_time_Sat,
            'sunday' => $data->sunday,
            'start_time_Sun' => $data->start_time_Sun,
            'end_time_Sun' => $data->end_time_Sun
        ];
        try {
            DB::beginTransaction();
            $med = Medical::create($data_med);

            $array2    = array('idMedical' => $med->id);
            $resultado = array_merge($data_horario, $array2);

            Timetable::create($resultado);
            DB::commit();
            return redirect()->route('medico.index')->with('success', 'Medico agregado con exito!.');
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollBack();
            return redirect()->route('medico.index')->with('error', 'Ocurrió un error, por favor intente de nuevo!.');
        }
    }

    public function activity()
    {
        $medicos = Medical::all();
        $muestras = Product::all();
        $activities = Activity::all();
        return view('actividad.index', compact('activities', 'medicos', 'muestras'));
    }

    public function activity_store()
    {
        $data = array();
        foreach ($_POST as $key => $value) {  //Recibo el los valores por POST 
            $data[$key] = $value;
        }

        $activity = [
            'idMedico' => $data['idMedico'],
            'observations' => $data['observation']
        ];

        try {
            DB::beginTransaction();
            $act = Activity::create($activity);

            for ($i = 0; $i < count($data['cantidad']); $i++) {
                $detalle = [
                    'idProduct' => $data['muestra_id'][$i],
                    'idActivity' => $act->id,
                    'cantidad' => $data['cantidad'][$i]
                ];

                MedicalSample::create($detalle);
            }
            DB::commit();
            return redirect()->route('medico.activity')->with('success', 'Registro agregado con exito!.');
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollBack();
            return redirect()->route('medico.activity')->with('error', 'Ocurrió un error, por favor intente de nuevo!.');
        }
    }
    public function list()
    {
        $medicals = Medical::where('idZone', auth()->user()->UserZone[0]->idZone)->where('status', 1)->get();
        return view('list_medical.index', compact('medicals'));
    }
}