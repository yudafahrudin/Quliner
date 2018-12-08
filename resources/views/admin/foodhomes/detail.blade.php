
<div class="col-sm-12 col-lg-12 main">

    <div class="row">
        <div class="col-md-12">

            @if(session()->has('message'))
            <div class="alert bg-success">
                {{ session()->get('message') }}
                <a href="#" class="pull-right"><em class="fa fa-lg fa-close"></em></a>
            </div>
            @endif

            <div class="panel panel-default">
                <div class="panel-body tabs">
                    <div class="canvas-wrapper">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="tab active">
                                <a href="#profile" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-user"></i></span> <span class="hidden-xs">Detail</span> </a>
                            </li>
                            <li class="tab">
                                <a href="#settings" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-cog"></i></span> <span class="hidden-xs">Settings</span> </a>
                            </li>
                            <li class="tab">
                                <a href="#nonactive" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-cog"></i></span> <span class="hidden-xs">Delete</span> </a>
                            </li>
                        </ul>   
                        <div class="tab-content">
                            <div id="profile" class="row tab-pane active">
                                <div class="col-md-3">
                                    <div class="user-bg">
                                        <div class="user-content">
                                            @unless (!Auth::guard('admin')->user())
                                            <img style="width: 100%" src="{{asset('storage/'.$foodhome->images[0]->url)}}" class="img-responsive" alt="">
                                            @endunless
                                        </div>
                                    </div>
                                </div>
                                <div class="white-box col-md-9">
                                    <div class="tab-pane active" id="profile" style="font-size:16px">
                                        <h3><strong>Name :</strong></h3>
                                        {{$foodhome->name}}
                                        <h3><strong>Address :</strong></h3>
                                        {{$foodhome->address}}
                                    </div>
                                </div>

                            </div>
                            <div id="settings" class="row tab-pane">
                                <div class="white-box col-md-12">
                                    <div class="tab-pane active" id="settings">

                                        <form id="submitUpdate" method="POST" action="{{ route('admin.foodhome.edit',['id'=>object_get($foodhome, 'id')]) }}">
                                            {{ method_field('PUT') }}
                                            @csrf
                                            <div class="form-group">
                                                <label class="col-md-12">Name</label>
                                                <div class="col-md-12">
                                                    <input type="text" id="name" name="name" placeholder="{{$foodhome->name}}" class="form-control form-control-line" value="{{$foodhome->name}}" required> </div>
                                            </div>
                                            <br />
                                            <div class="form-group">
                                                <label class="col-md-12">Address</label>
                                                <div class="col-md-12">
                                                    <input type="text" id="address" name="address" placeholder="{{$foodhome->address}}" value="{{$foodhome->address}}" class="form-control form-control-line" > </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="code" class="col-md-12">Geolocation </label>

                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <input class="form-control"  placeholder="{{$foodhome->map_x}}" value="{{$foodhome->map_x}}"  name="map_x"  />
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input class="form-control" placeholder="{{$foodhome->map_y}}" value="{{$foodhome->map_y}}"  name="map_y" />    
                                                        </div>
                                                    </div>                                                
                                                </div>
                                            </div>
                                            <div class="form-group">
                                            <label for="code" class="col-md-12 col-form-label text-md-right">Range </label>

                                            <div class="col-md-12">
                                                <textarea class="form-control" name="description">{{$foodhome->range}}</textarea>
                                            </div>
                                        </div>
                                            <div class="form-group">
                                            <label for="code" class="col-md-12 col-form-label text-md-right">Description </label>

                                            <div class="col-md-12">
                                                <textarea class="form-control" name="description">{{$foodhome->description}}</textarea>
                                            </div>
                                        </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <br>
                                                    <button type="submit" id="submitUpdateInput" class="btn btn-primary">
                                                        Update data
                                                    </button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                            <div id="nonactive" class="row tab-pane">
                                <div class="col-md-3">
                                    <div class="user-bg">
                                        <div class="user-content">
                                            @unless (!Auth::guard('admin')->user())
                                            <img style="width: 100%" src="{{asset('storage/'.$foodhome->images[0]->url)}}" class="img-responsive" alt="">
                                            @endunless
                                        </div>
                                    </div>
                                </div>
                                <div class="white-box col-md-9">
                                    <div class="tab-pane active" id="settings">

                                        <div class="form-group">
                                            <label class="col-md-12">Do you want to delete this foodhome ?
                                            </label>
                                            <div class="col-sm-12">
                                                <form action="{{route('admin.category.delete',['id' => $foodhome->id])}}" method="post" class="form-horizontal">
                                                    {{method_field('DELETE')}}
                                                    @csrf
                                                    <input type="submit" id="submitUpdateInput" class="btn btn-danger" value="Delete">
                                                </form>
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
</div>

<script type="text/javascript">
    $(document).ready(function () {

        var $imageupload = $('.imageupload');
        $imageupload.imageupload({
            allowedFormats: ["jpg", "jpeg", "png", "gif"],
            maxWidth: 200,
            maxHeight: 250,
            maxFileSizeKb: 2048
        });

    });
</script>
