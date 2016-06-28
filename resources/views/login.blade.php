@extends('layouts.master')

@section('content')

    @if ($alert = Session::get('successfullyLoggedOut'))
        <div class="alert alert-info">{{ $alert }}</div> @endif

    @if ($alert = Session::get('successfullyRegistered'))
        <div class="alert alert-info">{{ $alert }}</div> @endif

    <section id="form"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-5 col-sm-offset-1">

                    @if ($error = $errors->first('cannotLogin'))
                        <div class="alert alert-danger">
                            {{ $error }}
                        </div>
                    @endif

                    <div class="login-form"><!--login form-->
                        <h2>Zaloguj się do swojego konta</h2>

                        <form method="POST" action="{{url('auth/login')}}">
                            {{  csrf_field() }}

                            <div class="form-group">
                                <label for="email">Adres e-mail:</label>
                                <input type="email" class="form-control" name="email" id="email"
                                       placeholder="Podaj swój adres e-mail..."/>
                            </div>
                            <div class="form-group">
                                <label for="password">Hasło:</label>
                                <input type="password" class="form-control" name="password" id="password"
                                       placeholder="Wpisz swoje hasło..."/>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" name="remember" id="remember" type="checkbox">Pamiętaj
                                    mnie</label>
                            </div>
                            <button type="submit" class="btn btn-default btn-block">Zaloguj</button>
                        </form>
                    </div><!--/login form-->
                </div>
                <div class="col-sm-5">
                    @if ($errors->has('name'))
                        <div class="alert alert-danger">{{ $errors->first('name') }}</div> @endif
                    @if ($errors->has('email'))
                        <div class="alert alert-danger">{{ $errors->first('email') }}</div> @endif
                    @if ($errors->has('password'))
                        <div class="alert alert-danger">{{ $errors->first('password') }}</div> @endif

                    <div class="signup-form"><!--sign up form-->
                        <h2>Zarejestruj się!</h2>

                        <form method="POST" action="{{url('register')}}">
                            {{  csrf_field() }}
                            <div class="form-group">
                                <label for="name">Nazwa:</label>
                                <input type="text" name="name" id="name" class="form-control"
                                       placeholder="Podaj swoje imię, nazwisko lub/i nazwę użytkownika...">
                            </div>

                            <div class="form-group">
                                <label for="email">Adres e-mail:</label>
                                <input type="email" name="email" class="form-control"
                                       placeholder="Podaj istniejący adres e-mail..."/>
                            </div>

                            <div class="form-group">
                                <label for="password">Hasło:</label>
                                <input type="password" name="password" class="form-control"
                                       placeholder="Podaj przynajmniej 8-znakowe hasło...">
                            </div>
                            </br>
                            <button type="submit" class="btn btn-default btn-block">Zarejestruj się</button>
                        </form>
                    </div><!--/sign up form-->
                </div>
            </div>
        </div>
    </section><!--/form-->
@endsection