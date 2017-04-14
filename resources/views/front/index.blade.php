@extends('layouts.front')

@section('headerCss')
{{-- <link rel="stylesheet" href="{{asset('public/css/bootstrap.min.css')}}"/> --}}
<style>
.pagination {
  display: inline-block;
  padding-left: 0;
  margin: 20px 0;
  border-radius: 4px;
}
.pagination > li {
  display: inline;
}
.pagination > li > a,
.pagination > li > span {
  position: relative;
  float: left;
  padding: 6px 12px;
  margin-left: -1px;
  line-height: 1.42857143;
  color: #337ab7;
  text-decoration: none;
  background-color: #fff;
  border: 1px solid #ddd;
}
.pagination > li:first-child > a,
.pagination > li:first-child > span {
  margin-left: 0;
  border-top-left-radius: 4px;
  border-bottom-left-radius: 4px;
}
.pagination > li:last-child > a,
.pagination > li:last-child > span {
  border-top-right-radius: 4px;
  border-bottom-right-radius: 4px;
}
.pagination > li > a:hover,
.pagination > li > span:hover,
.pagination > li > a:focus,
.pagination > li > span:focus {
  z-index: 2;
  color: #23527c;
  background-color: #eee;
  border-color: #ddd;
}
.pagination > .active > a,
.pagination > .active > span,
.pagination > .active > a:hover,
.pagination > .active > span:hover,
.pagination > .active > a:focus,
.pagination > .active > span:focus {
  z-index: 3;
  color: #fff;
  cursor: default;
  background-color: #337ab7;
  border-color: #337ab7;
}
.pagination > .disabled > span,
.pagination > .disabled > span:hover,
.pagination > .disabled > span:focus,
.pagination > .disabled > a,
.pagination > .disabled > a:hover,
.pagination > .disabled > a:focus {
  color: #777;
  cursor: not-allowed;
  background-color: #fff;
  border-color: #ddd;
}
.pagination-lg > li > a,
.pagination-lg > li > span {
  padding: 10px 16px;
  font-size: 18px;
  line-height: 1.3333333;
}
.pagination-lg > li:first-child > a,
.pagination-lg > li:first-child > span {
  border-top-left-radius: 6px;
  border-bottom-left-radius: 6px;
}
.pagination-lg > li:last-child > a,
.pagination-lg > li:last-child > span {
  border-top-right-radius: 6px;
  border-bottom-right-radius: 6px;
}
.pagination-sm > li > a,
.pagination-sm > li > span {
  padding: 5px 10px;
  font-size: 12px;
  line-height: 1.5;
}
.pagination-sm > li:first-child > a,
.pagination-sm > li:first-child > span {
  border-top-left-radius: 3px;
  border-bottom-left-radius: 3px;
}
.pagination-sm > li:last-child > a,
.pagination-sm > li:last-child > span {
  border-top-right-radius: 3px;
  border-bottom-right-radius: 3px;
}
</style>
@stop

@section('content')
    <div id="content">
         <!--left-->
         <div class="left" id="c_left">
            <div class="s_tuijian">
              <h2>文章<span>推荐</span></h2>
            </div>
            <div class="content_text">
              @foreach($lists as $list)
              <div class="wz">
                <h3><a href="#" title="{{ $list->subject }}">{{ $list->subject }}</a></h3>
                <dl>
                  <dt><img src="{{asset('public/images/s3.jpg')}}" width="200" height="123" alt=""></dt>
                   <dd>
                     <p class="dd_text_1">{{ $list->content }}</p>
                   <p class="dd_text_2">
                   <span class="left author">博主</span><span class="left shijian">时间: {{ $list->riqi }}</span>
                   <span class="left fl">分类: <a href="#" title="{{ $list->tag }}">{{ $list->tag }}</a></span><span class="left yd"><a href="#" title="阅读全文">阅读全文</a>
                   </span>
                    <div class="clear"></div>
                   </p>
                   </dd>
                   <div class="clear"></div>
                </dl>
              </div>
              @endforeach
            </div>
            <div style="text-align: center;">
            {!! $lists->render() !!}
            </div>
         </div>
         <!--left end-->
         <!--right-->
         @include('front.right')
         <!--right end-->
         <div class="clear"></div>
    </div>
@stop