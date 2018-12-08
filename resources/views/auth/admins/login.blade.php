@extends('layouts.admins.app')
@section('content')
<div class="row">
    <div class="login">
        <h1> Jgn Lupa Makan ;) </h1>
        <form method="POST" action="{{ route('admin.login.post') }}">
            @csrf 

            @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
            
            @if ($errors->has('email'))
            <div class="alert bg-danger">
                {{ $errors->first('email') }}
                <a href="#" class="pull-right">
                    <em class="fa fa-lg fa-close"></em>
                </a>
            </div>
            @endif 
            @if ($errors->has('password'))
            <div class="alert bg-danger">
                {{ $errors->first('password') }}
                <a href="#" class="pull-right">
                    <em class="fa fa-lg fa-close"></em>
                </a>
            </div>
            @endif

            <input class="login-form { $errors->has('username') ? ' error_class' : '' }}" 
                   type="text" name="email" 
                   value="{{ old('email') }}"
                   placeholder="Email" 
                   required="required" 
                   autofocus
                   />
            <input class="login-form {{ $errors->has('password') ? ' error_class' : '' }}" 
                   type="password" 
                   name="password" 
                   placeholder="Password" 
                   required="required" 
                   />
            <button type="submit" class="btn btn-primary btn-block btn-large">Login</button>
        </form>
    </div>
</div>
@endsection