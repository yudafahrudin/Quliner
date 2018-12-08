@section('footer')
<!-- Scripts -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha384-pPttEvTHTuUJ9L2kCoMnNqCRcaMPMVMsWVO+RLaaaYDmfSP5//dP6eKRusbPcqhZ" crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.12.1/bootstrap-table.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap-imageupload@1.1.3/dist/js/bootstrap-imageupload.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.js"></script>
<script type="text/javascript" src="{{ asset('js/jquery.loading.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/dropzone.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>

<script type="text/javascript">
$(document).ready(function () {

//    $('#submitDeleteInput').on('click', function (e) {
//        e.preventDefault();
//        $.confirm({
//            title: 'Are you sure ?',
//            content: 'Delete this user  ',
//            buttons: {
//                confirm: function () {
//                    $('#submitDelete').submit();
//                },
//                cancel: function () {
//                    $.alert('Canceled!');
//                },
//            },
////            icon: 'fa fa-smile-o',
//            closeIcon: true,
//            animation: 'scale',
//        });
//    });

//    $("#submitUpdate").on('submit', (function (e) {
//        e.preventDefault();
//        console.log(new FormData(this));
////        $.ajax({
////            url: "ajax_php_file.php", // Url to which the request is send
////            type: "POST", // Type of request to be send, called as method
////            data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
////            contentType: false, // The content type used when sending data to the server.
////            cache: false, // To unable request pages to be cached
////            processData: false, // To send DOMDocument or non processed data file it is set to false
////            success: function (data)   // A function to be called if request succeeds
////            {
////                $('#loading').hide();
////                $("#message").html(data);
////            }
////        });
//    }));

//    $(document).on('submit', 'form#submitUpdate', function (e) {
//        var actionurl = e.currentTarget.action;
//        var name = $("#name").val();
//        var email = $("#email").val();
//        var description = $("#description").val();
//        var file = $('#filePhoto').prop('files');
//        e.preventDefault();
////        var fd = new FormData($("#submitUpdate"));
//        console.log(new FormData($(this)[0]));
////        $.confirm({
////            title: 'Are you sure ?',
////            content: 'Update this user  ',
////            buttons: {
////                confirm: function (e) {
////                    doSubmit({
////                        actionurl: actionurl,
////                        name: name,
////                        email: email,
////                        description: description,
////                        file: file,
////                    });
////                },
////                cancel: function () {
////                },
////            },
//////            icon: 'fa fa-smile-o',
////            closeIcon: true,
////            animation: 'scale',
////        });
//    });
    $(document).on('submit', 'form#submitDelete', function (e) {
        var actionurl = e.currentTarget.action;
        var name = $("#name").val();
        var email = $("#email").val();
//        var description = $("#description").val();

        e.preventDefault();
        $.confirm({
            title: 'Are you sure ?',
            content: 'delete this user  ',
            buttons: {
                confirm: function (e) {
                    doSubmit({
                        actionurl: actionurl,
                        name: name,
                        email: email,
//                        description: description
                    });
                },
                cancel: function () {
                },
            },
//            icon: 'fa fa-smile-o',
            closeIcon: true,
            animation: 'scale',
        });
    });

    var $imageupload = $('.imageupload');
    $imageupload.imageupload({
        allowedFormats: ["jpg", "jpeg", "png", "gif"],
        maxWidth: 200,
        maxHeight: 250,
        maxFileSizeKb: 2048
    });

    function doSubmit(e) {
        $.ajax({
            processData: false,
            contentType: false,
            cache: false,
            enctype: 'multipart/form-data',
            url: e.actionurl,
            type: 'POST',
            data: {name: e.name, email: e.email, description: e.description, file: e.file},

            beforeSend: function () {
//                setInterval(function () {
//                    $('.modal-content').loading('toggle');
//                }, 1000);
            },
            complete: function () {
//                                $("#loading").hide();
            },
            success: function (data) {
                notifyMessage(data.status, data.msg);
//                                $("#data").html("data receieved");
            }
        });
    }
});
</script>

<script type="text/javascript">

    $(document).ready(function () {
        $('#myTable').DataTable();
//
//        var table = $('#myTable').DataTable({
//            "processing": true,
//            "ajax": {
//                url: 'http://localhost/laravel_backend/public/users',
//            },
//            "dataSrc": function (json) {
//                var return_data = new Array();
//                for(var i=0;i< json.length; i++){
//        return_data.push({
//          'name': json[i].name,
//          'username'  : '<img src="' + json[i].url + '">',
//          'email' : json[i].email
//        })
//      }
//      return return_data;
//    }
//            },
//            "columns": [
//                {title: 'username'},
//                {title: 'name'},
//                {title: 'email'},
//            ]

//        });
//        setInterval(function () {
//            table.ajax.reload();
//        }, 1000);

    });

    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').focus()
    })

//    var $imageupload = $('.imageupload');
//    $imageupload.imageupload();
//
//    $('#imageupload-disable').on('click', function () {
//        $imageupload.imageupload('disable');
//        $(this).blur();
//    })
//
//    $('#imageupload-enable').on('click', function () {
//        $imageupload.imageupload('enable');
//        $(this).blur();
//    })
//
//    $('#imageupload-reset').on('click', function () {
//        $imageupload.imageupload('reset');
//        $(this).blur();
//    });

    function notifyMessage(type, message) {
        $.notify(
                message,
                {position: "top center", className: type}
        );
    }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function profileAjax(username) {
        $.ajax({
            url: "{{url('admin/users/profile/')}}/" + username,
            dataType: 'text',
            type: 'get',
            contentType: 'application/x-www-form-urlencoded',
            beforeSend: function () {
            },
            success: function (data, textStatus, jQxhr) {
                $('.modal-body').html(data);
            },
            error: function (jqXhr, textStatus, errorThrown) {
                $.alert(errorThrown);
            }
        });
    }
    function detailModel(data) {
        $.ajax({
            url: "{{url('admin/categories/detail/')}}/" + data,
            dataType: 'text',
            type: 'get',
            contentType: 'application/x-www-form-urlencoded',
            beforeSend: function () {
            },
            success: function (data, textStatus, jQxhr) {
                $('.modal-body').html(data);
            },
            error: function (jqXhr, textStatus, errorThrown) {
                $.alert(errorThrown);
            }
        });
    }
    function detailModelUrl(data, id) {
        $.ajax({
            url: $("#" + id).attr('data-url') + data,
            dataType: 'text',
            type: 'get',
            contentType: 'application/x-www-form-urlencoded',
            beforeSend: function () {
            },
            success: function (data, textStatus, jQxhr) {
                $('.modal-body').html(data);
            },
            error: function (jqXhr, textStatus, errorThrown) {
                $.alert(errorThrown);
            }
        });
    }
</script>

@endsection