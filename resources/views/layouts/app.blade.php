<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>{{ env('APP_NAME') }}</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700" rel="stylesheet">

    <!-- Bootstrap Core CSS -->
    <link href="{{ url('') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{ url('') }}/vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- jvectormap CSS -->
    <link href="{{ url('') }}/vendor/jquery-jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ url('') }}/css/adminnine.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ url('') }}/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


</head>

<body>
<!-- loader -->
<!-- loader ends -->
<div id="wrapper">
    <div class="navbar-default sidebar">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle"><span class="sr-only">Toggle navigation</span> <span
                    class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button>
        </div>
        <div class="clearfix"></div>
        <div class="sidebar-nav navbar-collapse">

            <!-- user profile pic -->
            <div class="userprofile text-center">
                <div class="userpic">
                    <img src="{{ url('img/img.png') }}" alt="" class="userpicimg">
                    <a href="{{ route('dashboard.index') }}"
                       class="btn btn-primary settingbtn">
                        <i class="fa fa-home"></i>
                    </a>
                </div>

                <h3 class="username">{{ auth()->guard('web')->user()->name }}</h3>

                <p>{{ auth()->guard('web')->user()->level }}</p>
            </div>
            <div class="clearfix"></div>
            <!-- user profile pic -->

            <ul class="nav" id="side-menu">
{{--                <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-bar-chart-o fa-fw"></i> Dashboard</a></li>--}}

                <li>
                    <a href="{{ route('hospital.index') }}">
                        <i class="fa fa-group fa-hospital-o"></i> Hospital
                    </a>
                </li>

                <li>
                    <a href="{{ route('patient.index') }}">
                        <i class="fa fa-group fa-fw"></i> Patient
                    </a>
                </li>

                <li><a href="{{ route('logout') }}"><i class="fa fa-sign-out"></i> Logout</a></li>

            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
    <div id="page-wrapper">
        <div class="row">
            <nav class="navbar navbar-default navbar-static-top" style="margin-bottom: 0">
            </nav>
        </div>

        <!-- /.row -->

        <ol class="breadcrumb">

        </ol>

        @yield('content')
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
{{--<script src="{{ url('') }}/vendor/jquery/jquery.min.js"></script>--}}
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>


<!-- Bootstrap Core JavaScript -->
<script src="{{ url('') }}/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- DataTables JavaScript -->
<script src="{{ url('') }}/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="{{ url('') }}/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="{{ url('') }}/vendor/datatables-responsive/dataTables.responsive.js"></script>


<!-- jvectormap JavaScript -->
<script src="{{ url('') }}/vendor/jquery-jvectormap/jquery-jvectormap.js"></script>
<script src="{{ url('') }}/vendor/jquery-jvectormap/jquery-jvectormap-world-mill-en.js"></script>

<!-- Custom Theme JavaScript -->
<script src="{{ url('') }}/js/adminnine.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->


<style>
    .cke_notification.cke_notification_warning {
        display: none;
    }
</style>
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

{{-- flatpickr --}}
<script src="//cdn.jsdelivr.net/npm/flatpickr"></script>


<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<script>
    // ini harus dibuat supaya ck editor bisa upload gambar
    CKEDITOR.config.filebrowserUploadMethod = 'form';

    // ini adalah inisialisasi setiap ck editor, dari id 0 sampai 3, jadi kalo perlu ckeditornya
    // kita tinggal pasang aja id yang tersedia dibawah ini, dan ck editor pun langsung tampil
    CKEDITOR.replace('editor-0', {
        height: 200,
        filebrowserUploadUrl: "{{ url('ckeditor/upload') }}"
    });
    CKEDITOR.replace('editor0', {
        height: 200,
        filebrowserUploadUrl: "{{ url('ckeditor/upload') }}"
    });
    CKEDITOR.replace('editor-1', {
        height: 200,
        filebrowserUploadUrl: "{{ url('ckeditor/upload') }}"
    });
    CKEDITOR.replace('editor1', {
        height: 200,
        filebrowserUploadUrl: "{{ url('ckeditor/upload') }}"
    });
</script>

@yield('script-in-this-page')

</body>
</html>
