<?php

namespace App\Http\Controllers;

use App\Odczynnik;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class OdczynnikiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $odczynniki = Odczynnik::all();
        return view('odczynniki.index')->withOdczynniki($odczynniki);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('odczynniki.create');
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
            'data_waznosci' => 'required|date|after:today',
        ]);

        $odczynnik = new Odczynnik;
        $odczynnik->nazwa = $request->nazwa;
        $odczynnik->firma = $request->firma;
        $odczynnik->numer_kat = $request->numer_kat;
        $odczynnik->ilosc = $request->ilosc;
        $odczynnik->jednostka = $request->jednostka;
        $odczynnik->masa_molowa = $request->masa_molowa;
        $odczynnik->data_waznosci = $request->data_waznosci;
        $odczynnik->cena_za_szt = $request->cena_za_szt;
        $odczynnik->lokalizacja = $request->lokalizacja;
        $odczynnik->temperatura = $request->temperatura;
        $odczynnik->odczynnik_typ_id = $request->odczynnik_typ_id;
        $odczynnik->asortyment_id = $request->asortyment_id;

        $odczynnik->save();

        return redirect()->action('OdczynnikiController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $odczynnik  = Odczynnik::find($id);

        return view('odczynniki.show')->with('odczynnik', $odczynnik);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $odczynnik = Odczynnik::find($id);

        return view('odczynniki.edit')->with('odczynnik', $odczynnik);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {


        $this->validate($request, [
            'nazwa' => 'required',
            'numer_kat' => 'required',
            'data_waznosci' => 'required|date|after:today',
        ]);

        \DB::table ( 'odczynnik' )->where ( 'id', $id)->update ( array (
            'nazwa' => $request->nazwa,
            'firma' => $request->firma,
            'numer_kat' => $request->numer_kat,
            'ilosc' => $request->ilosc,
            'jednostka' => $request->jednostka,
            'masa_molowa' => $request->masa_molowa,
            'data_waznosci' => $request->data_waznosci,
            'cena_za_szt' => $request->cena_za_szt,
            'lokalizacja' => $request->lokalizacja,
            'temperatura' => $request->temperatura,
            'odczynnik_typ_id' => $request->odczynnik_typ_id,
            'asortyment_id' => $request->asortyment_id
        ) );
        return redirect ()->action ( 'OdczynnikiController@index' );

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \DB::table('odczynnik')->where('ID', '=', $id)->delete();

        return redirect()->action('OdczynnikiController@index');
    }

}
