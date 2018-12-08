@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Sign Up</h5>
                    <form class="form-signin" method="POST" action="{{ route('register') }}" >
                        @csrf 
                        <div class="form-label-group">
                            <input type="text" id="inputEmail" class="form-control form-control-lg" placeholder="Email address" name="name" required autofocus>
                            <label for="name">Name</label>
                            @if ($errors->has('name'))
                            <small id="passwordHelp" class="text-danger">
                                {{ $errors->first('name') }}
                            </small> 
                            @endif 
                        </div>
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
                        
                        <div class="form-label-group">
                            <input type="password" id="inputPassword" class="form-control form-control-lg" placeholder="Password" name="password_confirmation" required>
                            <label for="inputPassword">Repeat Password</label>
                        </div>

                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign Up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!--    <div class="row">
        <div id="loginbox" style="margin-top:50px;" class="col-sm-9 col-md-7 col-lg-5 mx-auto">  
             <div class="panel panel-info">
                        <div class="panel-body" >
                            <form id="signupform" method="POST" action="{{ route('register') }}" class="form-horizontal" role="form">
                                @csrf
                                <div id="signupalert" style="display:none" class="alert alert-danger">
                                    <p>Error:</p>
                                    <span></span>
                                </div>
                                    
                                
                                  
                                <div class="form-group row">
                                    <label for="name" class="col-md-3 control-label">Name</label>
                                    <div class="col-md-9">
                                      <input id="name" type="text" placeholder="Full Name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                    </div>
                                </div>
                                    
                                <div class="form-group row">
                                    <label for="email" class="col-md-3 control-label">Email</label>
                                    <div class="col-md-9">
                                         <input id="email" type="email" placeholder="Your Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-md-3 control-label">Password</label>
                                    <div class="col-md-9">
                                         <input id="password" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                    </div>
                                </div>
                                  <div class="form-group row">
                                    <label for="password" class="col-md-3 control-label">Repeat Password</label>
                                    <div class="col-md-9">
                                      <input id="password-confirm" type="password" placeholder="Repeat Password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>

                                     Button                                         
                                        <button id="btn-signup" type="submit" class="btn btn-primary btn-block "><i class="icon-hand-right"></i> &nbsp Daftar</button>
                            </form>
                         </div>
                    </div>
        </div>
    </div>    
        -->
</div>
<!--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>-->
@endsection
