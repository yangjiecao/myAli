@extends('layouts.front')
@section('headerJs')
<script type="text/javascript" src="{{asset('public/js/common.js')}}"></script>
<script type="text/javascript" src="{{asset('public/js//waterfall.js')}}" ></script>
@stop

@section('content') 
    <!--content start-->
    <div id="content_xc">
         <div class="weizi">
           <div class="wz_text">当前位置：<a href="{{ url('/') }}">首页</a>><h1>相册展示</h1></div>
         </div>
         <div class="xc_content">
          <div class="con-bg">
              <div class="w960 mt_10">
               <div class="w650">
                <ul class="tips" id="wf-main" style="display:none" >
                @if(count($lists) <= 10)
                @foreach($lists as $list)
                <li class="wf-cld"><img src="http://caoyangjie.xyz/public/images/photo/{{$list->imgName}}.jpg"  width="200" height="{{$list->height}}" alt="" /></li>
                @endforeach
                @else
                @for($i=0; $i<10; $i++)
                <li class="wf-cld"><img src="http://caoyangjie.xyz/public/images/photo/{{$lists[$i]->imgName}}.jpg"  width="200" height="{{$lists[$i]->height}}" alt="" /></li>
                @endfor
                @for($i=10; $i<count($lists); $i++)
                <li class="wf-cld"><img rel="lazy" lazy_src="http://caoyangjie.xyz/public/images/photo/{{$lists[$i]->imgName}}.jpg"  width="200" height="{{$lists[$i]->height}}" alt="" /></li>
                @endfor
                @endif
                    </ul>
               </div>
             </div>
           </div>
         </div>
    </div>
    <!--content end-->
@stop

@section('footJs')
<script type="text/javascript">
    var timer, m = 0, m1 = $("img[rel='lazy']").length;

    function fade() {

        $("img[rel='lazy']").each(function () {

            var $scroTop = $(this).offset();

            if ($scroTop.top <= $(window).scrollTop() + $(window).height()) {

                $(this).hide();

                $(this).attr("src", $(this).attr("lazy_src"));

                $(this).attr("top", $scroTop.top);

                $(this).removeAttr("rel");

                $(this).removeAttr("lazy_src");

                $(this).fadeIn(600);

                var _left = $(this).parent().parent().attr("_left");

                if (_left != undefined)

                    $(this).parent().parent().animate({ left: _left }, 400);

                m++;

            }

        });

        if (m < m1) { timer = window.setTimeout(fade, 300); }

        else { window.clearTimeout(timer); }

    }

    $(function () {

        $("#wf-main img[rel='lazy']").each(function (i) {

            var _left = $(this).parent().parent().css("left").replace("px", "");

            $(this).parent().parent().attr("_left", _left);

            $(this).parent().parent().css("left", 0);

        });

        fade();

    });

    $(".loading").hide();

    $("#wf-main").show();

</script> 
@stop