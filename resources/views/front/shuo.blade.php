@extends('layouts.front')
@section('content')
    <!--content start-->
    <div id="say">
     <div class="weizi">
           <div class="wz_text">当前位置：<a href="{{ url('/') }}">首页</a>><h1>碎言碎语</h1></div>
           </div>
          @foreach($moods as $mood)
          <ul class="say_box">
            <div class="sy">
               {!! $mood->content !!}
            </div>
            <span class="dateview">{{ $mood->date }}</span>  
          </ul>        
          @endforeach
     </div>
    <!--content end-->
@stop
</body>
</html>
