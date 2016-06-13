<?php

namespace App\Http\Controllers;

use App\Kalkulator;

use App\Http\Controllers\Controller;

class KalkulatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kalkulator.index');
    }

}
