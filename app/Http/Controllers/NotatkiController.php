<?php

namespace App\Http\Controllers;

use App\Notatki;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class NotatkiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notatki = Notatki::all();
        return view('notatki.index')->withNotatki($notatki);
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notatki.create');
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
            'opis' => 'required',
        ]);
        
        $email = Auth::user()->email;
        $userid = Auth::user()->id;
        $name = Auth::user()->name;

        $date = new \DateTime();
        $date = $date->format('Y-m-d');
        
        $notatka = new Notatki;
        $notatka->nazwa = $request->nazwa;
        $notatka->opis = $request->opis;
        $notatka->data_utworzenia = $date;
        $notatka->user_email = $email;
        $notatka->user_id = $userid;
        $notatka->user_name = $name;
        
        $notatka->save();

        return redirect()->action('NotatkiController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notatka = Notatki::find($id);

        return view('notatki.show')->with('notatka', $notatka);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $notatka = Notatki::find($id);

        return view('notatki.edit')->with('notatka', $notatka);
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
            'opis' => 'required',
        ]);
        
        $email = Auth::user()->email;
        $userid = Auth::user()->id;
        $name = Auth::user()->name;
        
        $date = new \DateTime();
        $date = $date->format('Y-m-d');

        \DB::table ( 'notatki' )->where ( 'id', $id)->update ( array (
            'nazwa' => $request->nazwa,
            'opis' => $request->opis,
        	'data_utworzenia' => $date,
        	'user_email' => $email,
        	'user_id' => $userid,
        	'user_name' => $name,
        ) );
        return redirect ()->action ( 'NotatkiController@index' );

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \DB::table('notatki')->where('ID', '=', $id)->delete();

        return redirect()->action('NotatkiController@index');
    }

}
