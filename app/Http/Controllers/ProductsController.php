<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    public function index($categoria)
  {
    $products = Product::where('idCategory', $categoria)->where('available', 1)->get();
    return view('producto.index', compact('products'));
  }
}