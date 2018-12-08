@extends('layouts.admins.app')
@include('layouts.admins.breadcumb')

@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    
    <div class="row">
        {{ Breadcrumbs::render('user.profile' , $userFind) }}
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
                    

                    <span class="pull-right">
                        <a class="btn btn-success" href='{{route('user.show')}}'>
                            List User
                        </a>
                    </span> 
                </div>
                <div class="well profile">
            <div class="col-sm-12">
                <div class="col-xs-12 col-sm-4 text-center">
                    <figure>
                        <img src="{{ url('storage/admin/user/images/profile/'.$userFind->photo_thumb)}}" alt="" class="img-circle img-responsive">
                        <figcaption class="ratings">
                            <p>Ratings
                            <a href="#">
                                <span class="fa fa-star"></span>
                            </a>
                            <a href="#">
                                <span class="fa fa-star"></span>
                            </a>
                            <a href="#">
                                <span class="fa fa-star"></span>
                            </a>
                            <a href="#">
                                <span class="fa fa-star"></span>
                            </a>
                            <a href="#">
                                 <span class="fa fa-star-o"></span>
                            </a> 
                            </p>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-7">
                    <h2>{{$userFind->username}}</h2>
                    <p><strong>Name : </strong> {{ucwords($userFind->name)}}</p>
                    <p><strong>Email: </strong> {{ucwords($userFind->email)}} </p>
                    <p><strong>Description: </strong> {{ucwords($userFind->description)}} </p>
                    <p><strong>Skills: </strong>
                        <span class="tags">html5</span> 
                        <span class="tags">css3</span>
                        <span class="tags">jquery</span>
                        <span class="tags">bootstrap3</span>
                    </p>
                </div>             
                
            </div>            
            <div class="col-xs-12 divider text-center">
                <div class="col-xs-12 col-sm-4 emphasis">
                     <h2><strong>43</strong></h2>                    
                    <p><small>Posting</small></p>
                    
<!--                    <button class="btn btn-success btn-block"><span class="fa fa-plus-circle"></span> Follow </button>-->
                </div>
                <div class="col-xs-12 col-sm-4 emphasis">
                    <h2><strong> 20,7K </strong></h2>                    
                    <p><small>Followers</small></p>
                    <!--<button class="btn btn-info btn-block"><span class="fa fa-user"></span> View Profile </button>-->
                </div>
                <div class="col-xs-12 col-sm-4 emphasis">
                    <h2><strong>245</strong></h2>                    
                    <p><small>Following</small></p>
                    <div class="btn-group dropup btn-block">
                      <button type="button" class="btn btn-primary"><span class="fa fa-gear"></span> Options </button>
                      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul class="dropdown-menu text-left" role="menu">
                        <li><a href="#"><span class="fa fa-envelope pull-right"></span> Send an email </a></li>
                        <li><a href="#"><span class="fa fa-list pull-right"></span> Add or remove from a list  </a></li>
                        <li class="divider"></li>
                        <li><a href="#"><span class="fa fa-warning pull-right"></span>Report this user for spam</a></li>
                        <li class="divider"></li>
                        <li><a href="#" class="btn disabled" role="button"> Unfollow </a></li>
                      </ul>
                    </div>
                </div>
            </div>
    	 </div>     
            </div>
        </div>
    </div>
</div>
@endsection
