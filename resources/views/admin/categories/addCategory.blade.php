@extends('layouts.admins.app')
@include('layouts.admins.breadcumb')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        {{ Breadcrumbs::render('user.add') }}
        <br>
    </div>
    
    <div class="row">
        <div class="col-md-12">

            @if(session()->has('message'))
            <div class="alert bg-success">
                {{ session()->get('message') }}
                <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a>
            </div>
            @endif

            <div class="panel panel-default">
                <div class="panel-heading">
                    @lang('lang.registerNewUser')

                    <span class="pull-right">
                        <a class="btn btn-success" href='{{route('admin.category.show')}}'>
                            {{'Daftar category'}}
                        </a>
                    </span> 
                </div>
                <div class="panel-body">
                    <div class="canvas-wrapper">
                        <div class="main-chart" id="line-chart" height="200" width="600">

                            <div class="card card-default">

                                <div class="card-body">
                                    <form method="POST" action="{{ route('admin.category.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="name" class="col-md-2 col-form-label text-md-right"> {{ ucfirst(__('lang.name')) }} </label>

                                            <div class="col-md-10">
                                                <input id="name" placeholder="Fill name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" autofocus>

                                                @if ($errors->has('name'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="code" class="col-md-2 col-form-label text-md-right">Code </label>

                                            <div class="col-md-10">
                                                <input id="code" placeholder="Code must unique" type="text" class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}" name="code" value="{{ old('code') }}" required>

                                                @if ($errors->has('code'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('code') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row mt-4 mb-0">
                                            <br><br>
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    Submit
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    </div>
@endsection
