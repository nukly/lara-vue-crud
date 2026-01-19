<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Inertia\Inertia;


abstract class Controller
{
    public function Index()
    {
        return Inertia::render('products/index', []);
    }
    public function Create()
    {
        return Inertia::render('products/create', []);
    }

    public function store(Request $request){
        dd($request);
    }
}
