
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
                                <a href="#profile" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-user"></i></span> <span class="hidden-xs">Profile</span> </a>
                            </li>
                            <li class="tab">
                                <a href="#settings" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-cog"></i></span> <span class="hidden-xs">Settings</span> </a>
                            </li>
                            <li class="tab">
                                <a href="#nonactive" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-cog"></i></span> <span class="hidden-xs">Delete User</span> </a>
                            </li>
                        </ul>   
                        <div class="tab-content">
                            <div id="profile" class="row tab-pane active">
                                <div class="col-md-3">
                                    <div class="user-bg">
                                        <div class="user-content">
                                            @unless (!Auth::guard('admin')->user())
                                            <img style="width: 100%" src="{{ url('storage/'.$userFind->photo_thumb)}}" class="img-responsive" alt="">
                                            @endunless
                                        </div>
                                    </div>
                                </div>
                                <div class="white-box col-md-9">
                                    <div class="tab-pane active" id="profile" style="font-size:16px">
                                        <h3>{{ ucwords($userFind->name) }}</h3>
                                        <p>
                                            <i style="margin-right: 5px" class="glyphicon glyphicon-envelope"></i> {{$userFind->email}} <br />
                                            <i style="margin-right: 5px" class="fa fa-file"></i> {{$userFind->description}} <br />
                                            <i style="margin-right: 5px" class="fa fa-calendar"></i> {{$userFind->created_at->toDateString()}} <br />
                                        </p>

                                    </div>
                                </div>

                            </div>
                            <div id="settings" class="row tab-pane">
                                <form id="submitUpdate" method="POST" enctype="multipart/form-data" action="{{ route('edit.user',['id'=>object_get($userFind, 'id')]) }}">
                                    <div class="col-md-3">
                                        <div class="user-bg">
                                            <div style="margin-top:20px" class="user-content">
                                                <div class="form-group">
                                                    <div class="imageupload">
                                                        <div class="file-tab">
                                                            @unless (!Auth::guard('admin')->user())
                                                            <img style="width: 100%" src="{{ url('storage/admin/user/images/profile/'.$userFind->photo_thumb) }}" alt="Image preview" class="thumbnail img-responsive">
                                                            @endunless
                                                            <label class="btn btn-default btn-file">
                                                                <span>Browse</span>
                                                                <input id="filePhoto" type="file" name="photo">
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="white-box col-md-9">
                                        @csrf
                                        <div class="tab-pane active" id="settings">
                                            <div class="form-group">
                                                <label class="col-md-12">Name</label>
                                                <div class="col-md-12">
                                                    <input type="text" id="name" name="name" placeholder="{{$userFind->name}}" class="form-control form-control-line" value="{{$userFind->name}}"  required> </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Email</label>
                                                <div class="col-md-12">
                                                    <input disabled type="email" id="email" name="email" placeholder="{{$userFind->email}}" class="form-control form-control-line" > </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Description</label>
                                                <div class="col-md-12">
                                                    <textarea type="text" id="description" name="description" class="form-control form-control-line" >{{$userFind->description}}</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <br>
                                                    <button type="submit" id="submitUpdateInput" class="btn btn-primary">
                                                        Update profile
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
                                            <img style="width: 100%" src="{{ url('storage/'.$userFind->photo_thumb) }}" class="img-responsive" alt="">
                                            @endunless
                                        </div>
                                    </div>
                                </div>
                                <div class="white-box col-md-9">
                                    <div class="tab-pane active" id="settings">

                                        <div class="form-group">
                                            <label class="col-md-12">Do you want to delete this user ?
                                            </label>
                                            <div class="col-sm-12">
                                                <form action="{{ route('delete.user',['user' => $userFind->id]) }}" method="post" class="form-horizontal">
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

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("#submitUpdate").on('submit', (function (e) {

            const url = e.currentTarget.action
            const data = new FormData(this);
            const type = "POST";
            const contentType = false; // The content type used when sending data to the server.
            const cache = false; // To unable request pages to be cached
            const processData = false;

            e.preventDefault();
            $.confirm({
                title: 'Are you sure ?',
                content: 'Update this user  ',
                buttons: {
                    confirm: function (e) {
                        $.ajax({
                            url,
                            data,
                            type,
                            contentType,
                            cache,
                            processData,
                            success: function (data) {
                                notifyMessage(data.status, data.message);
                                $('.modal-body').load('{{url("admin/users/profile")}}/{{$userFind->email}}');
                                
                            },
                            error: function (xhr, ajaxOptions, thrownError) {
                                notifyMessage('error', thrownError);
                            }

                        });
                    },
                    cancel: function () {
                    },
                },
                closeIcon: true,
                animation: 'scale',
            });
        }));

    });
</script>
