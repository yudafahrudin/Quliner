@extends('layouts.app')

@section('content')

<div class="container">

    <!-- Section Detail -->
    <div class="foodhouse">
        <div class="row " style="margin-top:30px;">
            <div class="col-sm-6 col-md-6">
                <img width="550" src="{{asset('storage/'.$detailFoodhome->images[0]->url)}}">
                <!-- Section Corousel Banner-->                                 
            </div>
            <div class="col-sm-6 col-md-6">
                <div class="thumbnail" style="border-color: white;">
                    <h1 style="margin-bottom: 20px;">{{$detailFoodhome->name}}</h1>
<!--                    <p style="font-size: 18px;"><span class="glyphicon glyphicon-user" aria-hidden="true" style="margin-right: 8px;"></span>Jarotloveuyab</p>-->
                    <p style="font-size: 18px;"><span class="glyphicon glyphicon-map-marker" aria-hidden="true" style="margin-right: 8px;"></span>
                        {{$detailFoodhome->address}}</p>
                    <div style="margin-bottom: 30px;">
                        <div style="padding: 5px;" class="price">
                            <strong style="color: green; ">Kisaran 10.000 - 55.000</strong>
                            <button style="float:right;" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true" style="margin-right: 8px;"></span>Favorit</button>
                        </div>
                    </div>
                    <p style="text-align: justify; font-size: 16px;">
                        {{$detailFoodhome->description}}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Section Detail -->

</div>

@endsection
