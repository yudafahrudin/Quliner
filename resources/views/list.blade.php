@extends('layouts.app')

@section('content')

<div class="container">

    <!-- Section list category -->
    <div class="foodhouse">
        <div class="row">
            <span><h3 style="margin-left: 10px;" class="section-category" >Daftar Lokasi</h3></span>
            <div class="col-sm-12 col-md-12" >
                <div class="thumbnail" style="border-color:white; margin-bottom: 40px;">
                    <div class="category">
                        Category 
                        <select name="Category" size="1">
                            <option value="Rumah makan">Rumah Makan</option>
                            <option value="Cafe">Cafe</option>
                            <option value="Restaurant">Restaurant</option>
                            ::Rumah Makan::</select>
                    </div>
                    <div class="filter">
                        Filter 
                        <select name="Category" size="1">
                            <option value="Populer">Populer</option>
                            <option value="Terdekat">Terdekat</option>
                            ::Rumah Makan::</select>
                    </div>
                </div>
            </div>
            @foreach ($listFoodhome as $value)
            <div class="col-sm-12 col-md-12" >

                <div class="thumbnail">
                    <a href="/detail/{{$value->url}}">
                             <div style="float: left; margin-right: 10px;">
                        <img style="padding: 10px; object-fit: cover; width: 200px; height: 200px;" 
                             src="{{asset('storage/'.$value->images[0]->url)}}"
                             width=250px; alt="Sahabat Pink">
                    </div>
                    </a>
               
                    <div>
                        <h3>{{$value->name}}</h3>
                        <div style="padding: 5px" class="price">
                            <strong style="color: green;">{{$value->range}}</strong>
                        </div>
                        
                        <p style="text-align: justify; margin: 10px;">
                            {{$value->description}}
                        </p>  
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
    <!-- Section list Category -->
</div>

@endsection
