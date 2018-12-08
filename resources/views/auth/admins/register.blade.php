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
                        <a class="btn btn-success" href='{{route('user.show')}}'>
                            @lang('lang.listUser')
                        </a>
                    </span> 
                </div>
                <div class="panel-body">
                    <div class="canvas-wrapper">
                        <div class="main-chart" id="line-chart" height="200" width="600">

                            <div class="card card-default">

                                <div class="card-body">
                                    <form method="POST" action="{{ route('admin.register.post') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group {{ $errors->has('name') ? ' has-err-r' : '' }} row">
                                            <label for="name" class="col-md-2 col-form-label text-md-right"> {{ ucfirst(__('lang.name')) }} </label>

                                            <div class="col-md-10">
                                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus>

                                                @if ($errors->has('name'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }} row">
                                            <label for="email" class="col-md-2 col-form-label text-md-right">{{ ucfirst(__('lang.address')) }} E-Mail </label>

                                            <div class="col-md-10">
                                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                                @if ($errors->has('email'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}  row">
                                            <label for="password" class="col-md-2 col-form-label text-md-right">Password</label>

                                            <div class="col-md-10">
                                                <input id="password" type="password" class="form-control" name="password" required>

                                                @if ($errors->has('password'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="password-confirm" class="col-md-2 col-form-label text-md-right">{{ ucfirst(__('lang.confirm')) }} Password</label>

                                            <div class="col-md-10">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                            </div>
                                        </div>
                                        <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}row">
                                            <label for="password-confirm" class="col-md-2 col-form-label text-md-right">Description</label>

                                            <div class="col-md-10">
                                                <textarea class="form-control" name="description">{{ old('description') }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="isAdmin" class="col-md-2 col-form-label text-md-right">{{ "is admin ?" }}</label>

                                            <div class="col-md-10">
                                                <select class="form-control" name="isAdmin" id="admin">
                                                    <option value="1">Admin + User</option>
                                                    <option value="0">Just User</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="user-image" class="col-md-2 col-form-label text-md-right">{{ ucfirst(__('lang.image')) }}</label>

                                            <div class="col-md-7">
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
                                                    Register
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
