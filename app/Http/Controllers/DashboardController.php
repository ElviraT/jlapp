<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\RegisterTransfer;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // dd($request->method());
        $method = $request->method();
        $buscar = "";
        if ($request->isMethod('get')) {      
            // dd($request);     
            $buscar = $request->get("buscar");
        }
        // dd($buscar);
         # Exista o no exista búsqueda, los ordenamos
        $builder = Category::orderBy("name");
        if ($buscar) {
            # Si hay búsqueda, agregamos el filtro
            $builder->where("name", "LIKE", "%$buscar%");
        }
        # Al final de todo, invocamos a paginate que tendrá todos los filtros
        $categories = $builder->where('status', '1')->get();
        $user= User::where('id', auth()->user()->id)->first();
        $transferencias = RegisterTransfer::all();
        return view('dashboard', compact('categories','buscar','user','transferencias'));
    }
    public function rol($rol)
    {
        $user = User::where('id', auth()->user()->id)->update(['role' => $rol]);
        return response()->json('success');
    }
}