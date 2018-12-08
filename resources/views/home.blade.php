@extends('layouts.app')

@section('content')

<div class="container">

    <!-- Section Corousel Banner -->
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide" style="height: 500px; background-size:100% auto; background:url('https://www.reservasiku.com/wp-content/uploads/2018/03/Snow-Bowl-Surabaya.jpg') no-repeat center center;"></div>
            <div class="swiper-slide" style="height: 500px; background-size:100% auto; background:url('https://cdn3.id.orstatic.com/userphoto/Article/0/17/0008NY32CD6D1653DAFD1Apx.jpg') no-repeat center center;"></div>
            <div class="swiper-slide" style="height: 500px; background-size:100% auto; background:url('https://1.bp.blogspot.com/-Nn0fFyL6628/VdxicjgHzUI/AAAAAAAADxA/qSvy8DD-Jwo/s1600/DSCF6740.JPG') no-repeat center center;"></div>
        </div>
        <div class="swiper-pagination"></div>
    </div>
    <!-- Section Corousel Banner-->

    <!-- Section Category Rumah Makan -->
    <div class="foodhouse mb-4 p-3 mt-4" style="background-color: #F7F7F7">
        <span><h3 class="section-category" >Tempat Nongkrong & Café </h3></span>
        <div class="row">
            @foreach ($category as $value)
            <div class="col-sm-3 col-md-3">
                <div class="card p-0 bg-white">
                    <img class="card-img-top" style="padding: 10px; object-fit: cover; width: 100%; height: 200px;" src="{{asset('storage/'.$value->images[0]->url)}}" alt="Sahabat Pink">
                    <div class="card-body p-2">
                        <div class="card-title">
                            <h5 style=" width: 240px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{$value->name}}</h5>
                        </div>
                        <div class="address">
                            <button type="button" class="btn btn-warning btn-sm">
                                <span class="glyphicon glyphicon-map-marker"></span> {{substr($value->address, 0, 29)}}...
                            </button>
                        </div>
                        <div style="padding: 5px" class="price">
                            <strong style="color: green;">{{$value->range}}</strong>
                        </div>
                        <p  style="text-align: justify; ">{{substr($value->description, 0, 140)}} <a href="/detail/{{$value->url}}">lanjutkan baca</a></p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- Section Category Rumah Makan -->

    <!-- Section Pusat Oleh Oleh -->
    <div class="foodhouse mb-4 p-3" style="background-color: #1e9aff">
        <span><h4 class="section-category" style="background-color: #1e9aff; color: #fff;" >Pusat Oleh -Oleh</h4></span>
        <div class="row">
            @foreach ($category as $value)
            <div class="col-sm-3 col-md-3">
                <div class="card p-0 bg-white">
                    <img class="card-img-top" style="padding: 10px; object-fit: cover; width: 100%; height: 200px;" src="{{asset('storage/'.$value->images[0]->url)}}" alt="Sahabat Pink">
                    <div class="card-body p-2">
                        <div class="card-title">
                            <h5 style=" width: 240px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{$value->name}}</h5>
                        </div>
                        <div class="address">
                            <button type="button" class="btn btn-warning btn-sm">
                                <span class="glyphicon glyphicon-map-marker"></span> {{substr($value->address, 0, 28)}}...
                            </button>
                        </div>
                        <div style="padding: 5px" class="price">
                            <strong style="color: green;">{{$value->range}}</strong>
                        </div>
                        <p  style="text-align: justify; ">{{substr($value->description, 0, 140)}} <a href="/detail/{{$value->url}}">lanjutkan baca</a></p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- Section Pusat Oleh Oleh -->
</div>

@endsection
