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
                                    <form method="POST" action="{{ route('admin.foodhome.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="name" class="col-md-2 col-form-label text-md-right"> {{ ucfirst(__('lang.name')) }} </label>

                                            <div class="col-md-10">
                                                <input id="name" placeholder="Fill name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" autofocus required="">

                                                @if ($errors->has('name'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="code" class="col-md-2 col-form-label text-md-right">Address </label>

                                            <div class="col-md-10">
                                                <input id="code" placeholder="Fill in address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required>

                                                @if ($errors->has('address'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('address') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="code" class="col-md-2 col-form-label text-md-right">Price Range </label>

                                            <div class="col-md-10">
                                                <input id="code" placeholder="Fill in the estimated price" type="text" class="form-control{{ $errors->has('range') ? ' is-invalid' : '' }}" name="range" value="{{ old('range') }}" required>

                                                @if ($errors->has('range'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('range') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="code" class="col-md-2 col-form-label text-md-right">Category </label>

                                            <div class="col-md-10">
                                                <select name="categorie_id" class="form-control">
                                                    @foreach ($categories as $value)
                                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                                    @endforeach
                                                </select>

                                                @if ($errors->has('categorie_id'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('categorie_id') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="code" class="col-md-2 col-form-label text-md-right">Description </label>

                                            <div class="col-md-10">
                                                <textarea class="form-control" name="description"></textarea>

                                                @if ($errors->has('description'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('description') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="code" class="col-md-2 col-form-label text-md-right">Geolocation </label>

                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <input class="form-control" name="map_x" placeholder="langitude" />
                                                    </div>
                                                    <div class="col-md-3">
                                                        <input class="form-control" name="map_y" placeholder="longitude" />    
                                                    </div>
                                                </div>                                                
                                                @if ($errors->has('description'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('description') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="code" class="col-md-2 col-form-label text-md-right">Image </label>

                                            <div class="col-md-10">
                                                <div class="imageupload">
                                                    <div class="file-tab">
                                                        <label class="btn btn-default btn-file">
                                                            <span>Browse</span>
                                                            <input type="file" name="photo">
                                                        </label>
                                                        <button type="button" class="btn btn-default">Remove</button>
                                                    </div>
                                                </div>
                                                @if ($errors->has('photo'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('photo') }}</strong>
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
