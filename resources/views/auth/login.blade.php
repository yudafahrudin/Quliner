@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Sign In</h5>
                    <form class="form-signin" method="POST" action="{{ route('login') }}" >
                        @csrf  
                        <div class="form-label-group">
                            <input type="email" id="inputEmail" class="form-control form-control-lg" placeholder="Email address" name="email" required autofocus>
                            <label for="inputEmail">Email</label>
                            @if ($errors->has('enail'))
                            <small id="passwordHelp" class="text-danger">
                                {{ $errors->first('email') }}
                            </small> 
                            @endif 
                        </div>

                        <div class="form-label-group">
                            <input type="password" id="inputPassword" class="form-control form-control-lg" placeholder="Password" name="password" required>
                            <label for="inputPassword">Password</label>
                            @if ($errors->has('password'))
                            <small id="passwordHelp" class="text-danger">
                                {{ $errors->first('password') }}
                            </small> 
                            @endif
                        </div>

                        <div class="custom-control custom-checkbox mb-3">
                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                            <label class="custom-control-label" for="customCheck1">Remember password</label>
                        </div>
                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
                        <hr class="my-3">
                        <div style=" padding-top:15px; font-size:100%" >
                            Tidak punya akun ? 
                            <a href="{{ route('register') }}">
                                Daftar disini
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
