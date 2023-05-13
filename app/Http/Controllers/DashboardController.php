<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function rol($rol)
    {
        $user = User::where('id', auth()->user()->id)->update(['role' => $rol]);
        return response()->json('success');
    }
}
