<?php

namespace App\Http\Controllers;

use App\SprzetJednorazowyPodtyp;
use Illuminate\Http\Request;
use DB;

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
        $sprzet = SprzetJednorazowy::get();
        return view('sprzet_jednorazowy.index')->withSprzetJednorazowy($sprzet);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	return view('sprzet_jednorazowy.create');
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
			'nazwa' => 'required',
			'data_naprawy' => 'date',
			'data_zakupu' => 'date',
			'data_wymiany_filtr' => 'date',
			'czas_gwarancji' => 'date',
		]);

    	$sprzet = new SprzetJednorazowy;
    	$sprzet->nazwa = $request->nazwa;
    	$sprzet->firma = $request->firma;
    	$sprzet->numer_kat = $request->numer_kat;
    	$sprzet->pojemnosc = $request->pojemnosc;
    	$sprzet->kalibracja = $request->kalibracja;
    	$sprzet->data_naprawy = $request->data_naprawy;
    	$sprzet->opis_naprawy = $request->opis_naprawy;
    	$sprzet->data_zakupu = $request->data_zakupu;
    	$sprzet->data_wymiany_filtr = $request->data_wymiany_filtr;
    	$sprzet->czas_gwarancji = $request->czas_gwarancji;
    	$sprzet->lokalizacja = $request->lokalizacja;
    	$sprzet->sprzet_jedn_typ_id = $request->sprzet_jedn_typ_id;
    	$sprzet->sprzet_jedn_podtyp_id = $request->sprzet_jedn_podtyp_id;
    	$sprzet->asortyment_id = $request->asortyment_id;
    	$sprzet->ilosc = $request->ilosc;
    	$sprzet->cena_za_szt = $request->cena_za_szt;
    	
    	$sprzet->save();
    	
    	return redirect()->action('SprzetJednorazowyController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	$sprzet  = SprzetJednorazowy::find($id);
    	
    	return view('sprzet_jednorazowy.show')->with('sprzet', $sprzet);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$sprzet  = SprzetJednorazowy::find($id);
    	 
    	return view('sprzet_jednorazowy.edit')->with('sprzet', $sprzet);
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
			'nazwa' => 'required',
			'data_naprawy' => 'date',
			'data_zakupu' => 'date',
			'data_wymiany_filtr' => 'date',
			'czas_gwarancji' => 'date',
		]);

    	\DB::table ( 'sprzet_jedn' )->where ( 'id', $id)->update ( array (
    			'nazwa' => $request->nazwa,
    			'firma' => $request->firma,
    			'numer_kat' => $request->numer_kat,
    			'pojemnosc' => $request->pojemnosc,
    			'kalibracja' => $request->kalibracja,
    			'data_naprawy' => $request->data_naprawy,
    			'opis_naprawy' => $request->opis_naprawy,
    			'data_zakupu' => $request->data_zakupu,
    			'data_wymiany_filtr' => $request->data_wymiany_filtr,
    			'czas_gwarancji' => $request->czas_gwarancji,
    			'lokalizacja' => $request->lokalizacja,
    			'sprzet_jedn_typ_id' => $request->sprzet_jedn_typ_id,
    			'sprzet_jedn_podtyp_id' => $request->sprzet_jedn_podtyp_id,
    			'asortyment_id' => $request->asortyment_id,
    			'ilosc' => $request->ilosc,
    			'cena_za_szt' => $request->cena_za_szt
    	) );
    	return redirect ()->action ( 'SprzetJednorazowyController@index' );
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	\DB::table('sprzet_jedn')->where('ID', '=', $id)->delete();
    	
    	return redirect()->action('SprzetJednorazowyController@index');
    }
}
