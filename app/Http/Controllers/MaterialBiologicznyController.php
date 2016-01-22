<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\MaterialBiologiczny;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MaterialBiologicznyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materialBiologiczny = MaterialBiologiczny::get();
        return view('material_biologiczny.index')->withMaterialBiologiczny($materialBiologiczny);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('material_biologiczny.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$this->validate($request, [
			'rodzaj _komorek' => 'required',
			'rodzaj_tkanki' => 'required',
			'data_dostarczenia' => 'date',
			'data_izolacji' => 'date',
			'data_zamrozenia' => 'date',
			'data_gwarancji' => 'date',
		]);

    	$materialBiologiczny = new MaterialBiologiczny;
    	
    	$materialBiologiczny->rodzaj_komorek = $request->rodzaj_komorek;
    	$materialBiologiczny->rodzaj_tkanki = $request->rodzaj_tkanki;
    	$materialBiologiczny->firma = $request->firma;
    	$materialBiologiczny->data_dostarczenia = $request->data_dostarczenia;
    	$materialBiologiczny->data_izolacji = $request->data_izolacji;
    	$materialBiologiczny->organizm = $request->organizm;
    	$materialBiologiczny->data_zamrozenia = $request->data_zamrozenia;
    	$materialBiologiczny->temperatura_przechowywania = $request->temperatura_przechowywania;
    	$materialBiologiczny->ilosc_komorek = $request->ilosc_komorek;
    	$materialBiologiczny->stezenie_RNA = $request->stezenie_RNA;
    	$materialBiologiczny->stezenie_DNA = $request->stezenie_DNA;
    	$materialBiologiczny->objetosc_tkanki = $request->objetosc_tkanki;
    	$materialBiologiczny->sposob_utrwalenia = $request->sposob_utrwalenia;
    	$materialBiologiczny->obserwacje = $request->obserwacje;
    	$materialBiologiczny->rodzaj_probowki = $request->rodzaj_probowki;
    	$materialBiologiczny->stezenie = $request->stezenie;
    	$materialBiologiczny->objetosc_probki = $request->objetosc_probki;
    	$materialBiologiczny->data_gwarancji = $request->data_gwarancji;
    	$materialBiologiczny->lokalizacja = $request->lokalizacja;
    	$materialBiologiczny->material_biologiczny_typ_id = $request->material_biologiczny_typ_id;
    	$materialBiologiczny->asortyment_id = $request->asortyment_id;
        
    	$materialBiologiczny->save();
    	
    	return redirect()->action('MaterialBiologicznyController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	$material  = MaterialBiologiczny::find($id);
    	
    	return view('material_biologiczny.show')->with('material', $material);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$materialBiologiczny  = MaterialBiologiczny::find($id);
    	 
    	return view('material_biologiczny.edit')->with('materialBiologiczny', $materialBiologiczny);
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
		$this->validate($request, [
			'rodzaj_komorek' => 'required',
			'rodzaj_tkanki' => 'required',
			'data_dostarczenia' => 'date',
			'data_izolacji' => 'date',
			'data_zamrozenia' => 'date',
			'data_gwarancji' => 'date',
		]);

    	\DB::table ( 'material_biologiczny' )->where ( 'id', $id)->update ( array (
    			'rodzaj_komorek' => $request->rodzaj_komorek,
    			'rodzaj_tkanki' => $request->rodzaj_tkanki,
    			'firma' => $request->firma,
    			'data_dostarczenia' => $request->data_dostarczenia,
    			'data_izolacji' => $request->data_izolacji,
    			'organizm' => $request->organizm,
    			'data_zamrozenia' => $request->data_zamrozenia,
    			'temperatura_przechowywania' => $request->temperatura_przechowywania,
    			'ilosc_komorek' => $request->ilosc_komorek,
    			'stezenie_RNA' => $request->stezenie_RNA,
    			'stezenie_DNA' => $request->stezenie_DNA,
    			'objetosc_tkanki' => $request->objetosc_tkanki,
    			'sposob_utrwalenia' => $request->sposob_utrwalenia,
    			'obserwacje' => $request->obserwacje,
    			'rodzaj_probowki' => $request->rodzaj_probowki,
    			'stezenie' => $request->stezenie,
    			'objetosc_probki' => $request->objetosc_probki,
    			'data_gwarancji' => $request->data_gwarancji,
    			'lokalizacja' => $request->lokalizacja,
    			'material_biologiczny_typ_id' => $request->material_biologiczny_typ_id,
    			'asortyment_id' => $request->asortyment_id
    	) );
    	return redirect ()->action ( 'MaterialBiologicznyController@index' );
    }
    
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	\DB::table('material_biologiczny')->where('ID', '=', $id)->delete();
    	
    	return redirect()->action('MaterialBiologicznyController@index');
    }
}

















