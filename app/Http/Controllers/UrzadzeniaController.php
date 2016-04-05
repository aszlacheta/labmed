<?php

namespace App\Http\Controllers;

use App\Urzadzenia;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UrzadzeniaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $urzadzenia = Urzadzenia::get();
        return view('urzadzenia.index')->withUrzadzenia($urzadzenia);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	return view('urzadzenia.create');
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
			'numer_kat' => 'required',
			'data_zakupu' => 'required|date',
			'data_wymiany_filtr' => 'date',
			'czas_gwarancji' => 'required|date',
		]);

    	$urzadzenie = new Urzadzenia;
    	$urzadzenie->nazwa = $request->nazwa;
    	$urzadzenie->numer_kat = $request->numer_kat;
    	$urzadzenie->data_zakupu = $request->data_zakupu;
    	$urzadzenie->data_wymiany_filtr = $request->data_wymiany_filtr;
    	$urzadzenie->czas_gwarancji = $request->czas_gwarancji;
    	$urzadzenie->lokalizacja = $request->lokalizacja;
    	$urzadzenie->urzadzenie_typ_id = $request->urzadzenie_typ_id;
    	$urzadzenie->asortyment_id = $request->asortyment_id;
    	$urzadzenie->ilosc = $request->ilosc;
    	
    	$urzadzenie->save();
    	
    	return redirect()->action('UrzadzeniaController@index');
    }

	/**
	 * @return JSON with
	 */
	public function getCloseToExpirationDate(){
		$date = new \DateTime();
		$date->add(new \DateInterval('P7D'));
		$date = $date->format('Y-m-d');

		$urzadzenia = Urzadzenia::where('data_wymiany_filtr', '<=', $date)->get();
		return response()->json($urzadzenia);
	}

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    	$urzadzenie = Urzadzenia::find($id);
    	
    	return view('urzadzenia.show')->with('urzadzenie', $urzadzenie);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$urzadzenie = Urzadzenia::find($id);
    	 
    	return view('urzadzenia.edit')->with('urzadzenie', $urzadzenie);
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
			'numer_kat' => 'required',
			'data_zakupu' => 'required|date',
			'data_wymiany_filtr' => 'date',
			'czas_gwarancji' => 'required|date',
		]);

    	\DB::table ( 'urzadzenie' )->where ( 'id', $id)->update ( array (
    			'nazwa' => $request->nazwa,
    			'numer_kat' => $request->numer_kat,
    			'data_zakupu' => $request->data_zakupu,
    			'data_wymiany_filtr' => $request->data_wymiany_filtr,
    			'czas_gwarancji' => $request->czas_gwarancji,
    			'lokalizacja' => $request->lokalizacja,
    			'urzadzenie_typ_id' => $request->urzadzenie_typ_id,
    			'asortyment_id' => $request->asortyment_id,
    			'ilosc' => $request->ilosc
    	) );
    	return redirect ()->action ( 'UrzadzeniaController@index' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	\DB::table('urzadzenie')->where('ID', '=', $id)->delete();
    	
    	return redirect()->action('UrzadzeniaController@index');
    }
}
