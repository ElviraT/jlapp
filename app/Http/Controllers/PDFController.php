<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\ActivityLogF;
use App\Models\Activity;

class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data = [
            'title' => 'JL Pharma Medicinas',
            'activity' => ActivityLogF::where('id', $id)->where('jornada', 0)->first(),
        ];

        $pdf = PDF::loadView('pdf.index', $data);
        return $pdf->download('transferencia' . $id . '.pdf');
    }
    public function pdf_med($id)
    {
        $data = [
            'title' => 'JL Pharma Medicinas',
            'activity' => Activity::where('id', $id)->first(),
        ];

        $pdf = PDF::loadView('pdf.index_med', $data);

        return $pdf->download('transferencia-medico' . $id . '.pdf');
    }
}
