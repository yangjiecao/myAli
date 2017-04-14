<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="博客,漂流的木头,php,网站,后端,web">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="wb:webmaster" content="ccb8642eee5d3a6f" />
    <meta name="description" content="{{ $description or 'The description' }}">
    <meta name="author" content="{{ $author or 'The author' }}">
    <title>{{ $title or '博客后台程序' }}</title>

    <link href="{{ asset('public/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/metisMenu.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

    @yield('headCss')
    
    @yield('headJs')

</head>
<body>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            @include('layouts.navigation-top')
            @include('layouts.navigation-left')
        </nav>

        <div id="page-wrapper" style="height: 1000px">
            <!-- /.row -->
            @yield("dataBody")
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

        <!-- js files -->
    <script src="{{asset('public/js/jquery3.1.1.min.js')}}"></script>
    <script src="{{asset('public/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/js/metisMenu.min.js')}}"></script>
    <script src="{{asset('public/js/sb-admin-2.min.js')}}"></script>
    @yield('footJsFiles')
            <!-- jquery scripts -->
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                processData: false,
                contentType: false
            });
            @yield('footJquery')
        });
    </script>
    <!-- js scripts -->
    @yield('footJs')
</body>
</html>


