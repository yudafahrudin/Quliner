@extends('layouts.app')

@section('content')

<div class="container">
    <!-- Section Profil User -->
    <div class="foodhouse">
        <div class="row " style="margin-top:50px;">
            <div class="col-sm-4 col-md-4">
                <div class="thumbnail" style="border-color: white;">
                    @if($image == null)
                    <img class="img-circle" style=" width: 200px; height: auto; margin-top: 30px;" src=" http://swasti.org/wp-content/plugins/awsm-team-pro/images/default-user.png" alt="Sahabat Pink">
                    @else
                    <img class="img-circle" style=" width: 200px; height: auto; margin-top: 30px;" src="{{ url('storage/'.$image)}}" alt="Sahabat Pink">
                    @endif
                     <a href="#"><p style="text-align: center; margin-top:10px; ">Ganti Foto Profil</p> </a>
                </div>
            </div>
            <div class="col-sm-4 col-md-4">
                <div class="thumbnail" style="border-color: white;">
                    <h1 style="margin-bottom: 20px;">{{$name}}</h1>
<!--                    <p style="font-size: 18px;"><span class="glyphicon glyphicon-user" aria-hidden="true" style="margin-right: 8px;"></span>Jarotloveuyab</p>-->
                    <p style="font-size: 18px;"><span class="glyphicon glyphicon-envelope" aria-hidden="true" style="margin-right: 8px;"></span>{{$email}}</p>
                    <textarea class="form-control" rows="7">{{$description}}</textarea>
                </div>
            </div>
            <div class="col-sm-4 col-md-4">
                <div class="thumbnail" style="border-color: white;">
                    <h3>Daftar Favorit</h3>
                    <div class="thumbnail" style="display: block; max-height: 250px; overflow-y: auto; ">
                        <div>
                            <img style="height: 50px; width: 100px; margin-right: 10px;" align="left" src="https://indonesia.tripcanvas.co/id/wp-content/uploads/sites/2/2017/08/Surabaya-cafes-feature.jpg" alt="Sahabat Pink">
                            <p style=" font-size: 18px; " >Rumah Kita Sendiri milik orang indonesia</p>
                        </div>
                        <div>
                            <img style="height: 50px; width: 100px; margin-right: 10px;" align="left" src="https://indonesia.tripcanvas.co/id/wp-content/uploads/sites/2/2017/08/Surabaya-cafes-feature.jpg" alt="Sahabat Pink">
                            <p style=" font-size: 18px; " >Rumah Kita Sendiri milik orang indonesia</p>
                        </div>
                        <div>
                            <img style="height: 50px; width: 100px; margin-right: 10px;" align="left" src="https://indonesia.tripcanvas.co/id/wp-content/uploads/sites/2/2017/08/Surabaya-cafes-feature.jpg" alt="Sahabat Pink">
                            <p style=" font-size: 18px; " >Rumah Kita Sendiri milik orang indonesia</p>
                        </div>
                        <div>
                            <img style="height: 50px; width: 100px; margin-right: 10px;" align="left" src="https://indonesia.tripcanvas.co/id/wp-content/uploads/sites/2/2017/08/Surabaya-cafes-feature.jpg" alt="Sahabat Pink">
                            <p style=" font-size: 18px; " >Rumah Kita Sendiri milik orang indonesia</p>
                        </div>
                        <div>
                            <img style="height: 50px; width: 100px; margin-right: 10px;" align="left" src="https://indonesia.tripcanvas.co/id/wp-content/uploads/sites/2/2017/08/Surabaya-cafes-feature.jpg" alt="Sahabat Pink">
                            <p style=" font-size: 18px; " >Rumah Kita Sendiri milik orang indonesia</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Section Profil User -->

</div>

@endsection
