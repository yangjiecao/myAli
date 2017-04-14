@extends('layouts.front')
@section('content')
    <div id="content">
       <!--left-->
         <div class="left" id="about_me">
           <div class="weizi">
           <div class="wz_text">当前位置：<a href="{{ url('/') }}">首页</a>><h1>关于我</h1></div>
           </div>
           <div class="about_content">
             {{ $introduction }}
           </div>
         </div>
         <!--end left -->
         <!--right-->
         @include('front.right')
         <!--end  right-->
         <div class="clear"></div>
         
    </div>
@stop