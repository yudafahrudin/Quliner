@extends('layouts.admins.app')
@include('layouts.admins.breadcumb')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    
    <div class="row">
        {{ Breadcrumbs::render('user') }}
        <br>
    </div>
     <div class="row">
         <div class="col-md-12">
             
         </div>
     </div>
</div>
@endsection

