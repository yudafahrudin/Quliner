
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
                                <div class="white-box col-md-9">
                                    <div class="tab-pane active" id="profile" style="font-size:16px">
                                        <h3><strong>Name :</strong></h3>
                                        {{$category->name}}
                                        <h3><strong>Code :</strong></h3>
                                        {{$category->code}}
                                    </div>
                                </div>

                            </div>
                            <div id="settings" class="row tab-pane">
                                <div class="white-box col-md-12">
                                    <div class="tab-pane active" id="settings">

                                        <form id="submitUpdate" method="POST" action="{{ route('admin.category.edit',['id'=>object_get($category, 'id')]) }}">
                                            @csrf
                                            <div class="form-group">
                                                <label class="col-md-12">Name</label>
                                                <div class="col-md-12">
                                                    <input type="text" id="name" name="name" placeholder="{{$category->name}}" class="form-control form-control-line" value="{{$category->name}}"  required> </div>
                                            </div>
                                            <br />
                                            <div class="form-group">
                                                <label class="col-md-12">Code</label>
                                                <div class="col-md-12">
                                                    <input disabled type="email" id="email" name="email" placeholder="{{$category->code}}" class="form-control form-control-line" > </div>
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
                                <div class="white-box col-md-12">
                                    <div class="tab-pane active" id="settings">

                                        <div class="form-group">
                                            <label class="col-md-12">Do you want to delete this category ?
                                               </label>
                                            <div class="col-sm-12">
                                                <form action="{{route('admin.category.delete',['id' => $category->id])}}" method="post" class="form-horizontal">
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
                content: 'Update this category  ',
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
                                $('.modal-body').load('{{url("admin/categories/detail")}}/{{$category->code}}');
                                
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
