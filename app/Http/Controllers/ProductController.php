<?php

namespace App\Http\Controllers;

use App\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderByDesc('id')->paginate(20);

        return view('products', compact('products'));
    }
}
