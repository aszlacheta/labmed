<?php

namespace App\Http\Controllers;

use App\SprzetJednorazowyPodtyp;
use Illuminate\Http\Request;

use App\SprzetJednorazowy;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SprzetJednorazowyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sprzetJednorazowy = SprzetJednorazowy::with(array('sprzetJednorazowyTyp'))->get();
//        $sprzetJednorazowy = SprzetJednorazowy::with(array('sprzetJednorazowyPodtypp'))->get();
        return view('sprzet_jednorazowy.index')->withSprzetJednorazowy($sprzetJednorazowy);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
