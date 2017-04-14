<!DOCTYPE HTML>
<html lang="zh-CN">
<head>
<meta charset="UTF-8">
<title>{{$title or '漂流的木头的博客'}}</title>
<meta name="keywords" content="个人博客" />
<meta name="description" content="" />
<link rel="stylesheet" href="{{asset('public/css/index.css')}}"/>
<link rel="stylesheet" href="{{asset('public/css/style.css')}}"/>
@yield('headerCss')
<script type="text/javascript" src="{{asset('public/js/jquery1.42.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/js/jquery.SuperSlide.2.1.1.js')}}"></script>
@yield('headerJs')
<!--[if lt IE 9]>
<script src="js/html5.js"></script>
<![endif]-->
</head>

<body>
    <!--header start-->
    <div id="header">
      <h1>个人博客</h1>
      <p>悟已往之不谏,知来者之可追。</p>    
    </div>
     <!--header end-->
    <!--nav-->
     <div id="nav">
        <ul>
         <li><a href="{{url('/')}}">首页</a></li>
         <li><a href="{{url('/about')}}">关于我</a></li>
         <li><a href="{{url('/shuo')}}">碎言碎语</a></li>
         <li><a href="{{url('/riji')}}">个人日记</a></li>
         <li><a href="{{url('/xc')}}">相册展示</a></li>
         <li><a href="{{url('/learn')}}">学无止境</a></li>
         <li><a href="{{url('/guestbook')}}">留言板</a></li>
         <div class="clear"></div>
        </ul>
      </div>
@yield('content')
    <div id="footer">
     <p>联系博主: 416706545@qq.com</p>
    </div>
@yield('footHtml')
    <!--footer end-->
    <script type="text/javascript">jQuery(".lanmubox").slide({easing:"easeOutBounce",delayTime:400});</script>
    <script  type="text/javascript" src="{{asset('public/js/nav.js')}}"></script>
@yield('footJs')
</body>
</html>
