<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use App\User;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginAndRegisterFormRequest;
use Input;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(LoginAndRegisterFormRequest $request)
    {
        if (Request::isMethod('post')) {
            User::create([
                'name' => Request::get('name'),
                'email' => Request::get('email'),
                'password' => bcrypt(Request::get('password')),
            ]);
        }

        return view('pages.home');
    }

    /**
     * Display the specified resource.
     * authentication!!!!!
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $credentials = [
            'email' => Input::get('email'),
            'password' => Input::get('password')
        ];

        if (Auth::attempt($credentials)) {
            return Redirect::to('/')->with('successfullyLoggedIn', 'Zostałeś poprawnie zalogowany');
        } else {
            $errors = ['cannotLogin' => 'Niepoprawny adres e-mail bądź hasło. Spróbuj zalogować się jeszcze raz.'];
            return Redirect::back()->withErrors($errors);
        }
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
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        Auth::logout();
        return Redirect::to('/auth/login')->with('successfullyLoggedOut', 'Zostałeś poprawnie wylogowany.');
    }
}
