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
    <title>{{ $title or '博客后台登录页面' }}</title>

    <link href="{{ asset('public/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/metisMenu.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">请登录</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form">
                            <fieldset>
                                <div class="form-group ">
                                    <input id="email" class="form-control" placeholder="账号..." name="email" type="email" autofocus >
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="密码..." name="password" type="password" >
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="button" class="btn btn-lg btn-success btn-block" id="login">登录</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    <script src="{{asset('public/js/jquery3.1.1.min.js')}}"></script>
    <script src="{{asset('public/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/js/metisMenu.min.js')}}"></script>
    <script src="{{asset('public/js/sb-admin-2.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                processData: false,
                contentType: false
            });
            var url = '{{ url('login') }}';
            $(document).on('click', '#login', function(event){
                event.preventDefault();
                var myData = new FormData(this.form);
                $.ajax({
                    type: "POST",
                    url: url,
                    data: myData,
                    success: function (xhr) {
                        if (xhr.errCode == 0) {
                            location.href = '/admin';
                        } else {
                            alert(xhr.msg);
                        }
                    },
                    error: function (xhr) {
                        console.log(xhr);
                    }
                });
            });

        });
    </script>
</body>
</html>


