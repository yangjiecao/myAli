@extends('layouts.front')

@section('content')
    <!--content start-->
    <div id="content">
       <!--left-->
         <div class="left" id="riji">
           <div class="weizi">
           <div class="wz_text">当前位置：<a href="{{ url('/') }}">首页</a>><h1>个人日记</h1></div>
           </div>
           <div class="rj_content">
           @foreach($dailies as $daily)
              <div class="shiguang animated bounceIn">
                <div class="left sg_ico">
                <img src="{{asset('public/images/my_1.jpg')}}" width="120" height="120" alt=""/>
                </div>
                <div class="right sg_text">
                <img src="{{asset('public/images/left.png')}}" width="13" height="16" alt="左图标"/>
                        {!! $daily->content !!}
                </div>
                <div class="clear"></div>
              </div>
            @endforeach
           </div>
         </div>
         <!--end left -->
         <!--right-->
         @include('front.right')
         <!--end  right-->
         <div class="clear"></div>
         
    </div>
    <!--content end-->
@stop
</body>
</html>

