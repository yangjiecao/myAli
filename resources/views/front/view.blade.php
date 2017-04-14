@extends('layouts.front')
@section('content')
    <div id="content">
       <!--left-->
         <div class="left" id="learn">
           <div class="weizi">
           <div class="wz_text">当前位置：<a href="{{ url('/') }}">首页</a>><h1>学无止境</h1></div>
           </div>
           <div class="l_content">
           <div style="width:710px;height:55px;margin-left:10px;background:url('{{ asset('public/images/r_line.jpg') }}') bottom left repeat-x;">
           <h1>{{ $article->subject }}</h1>
           </div>
           <div style="margin-left:10px">
             {!! $article->content !!}
           </div>
<!-- 多说评论框 start -->
  <div class="ds-thread" data-thread-key="{{ $article->id }}" data-title="文章" data-url="http://caoyangjie.xyz/view/{{ $article->id }}"></div>
<!-- 多说评论框 end -->
<!-- 多说公共JS代码 start (一个网页只需插入一次) -->
<script type="text/javascript">
var duoshuoQuery = {short_name:"caoyangjie"};
  (function() {
    var ds = document.createElement('script');
    ds.type = 'text/javascript';ds.async = true;
    ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.js';
    ds.charset = 'UTF-8';
    (document.getElementsByTagName('head')[0] 
     || document.getElementsByTagName('body')[0]).appendChild(ds);
  })();
  </script>
<!-- 多说公共JS代码 end -->           
           </div>
         </div>
         <!--end left -->
         <!--right-->
         @include('front.right')
         <!--end  right-->
         <div class="clear"></div>
         
    </div>
@stop
</body>
</html>