@extends('layouts.admin')
@section('headCss')
<link rel="stylesheet" href="{{ asset('public/css/calendar.css') }}">
<link rel="stylesheet" href="{{ asset('public/css/sweetalert.css') }}">
<link rel="stylesheet" href="{{ asset('public/css/docs.css') }}">
<link rel="stylesheet" href="{{ asset('public/css/cntl.min.css') }}">
@stop
@section('dataBody')
<div class="row" style="background:url({{ asset('public/images/tm-bg-slide-2.jpg') }}) no-repeat center; background-size:100% 420px; height: 100px" id="app">
	<div align="right">
		<iframe allowtransparency="true" frameborder="0" width="385" height="96" scrolling="no" src="//tianqi.2345.com/plugin/widget/index.htm?s=2&z=2&t=0&v=0&d=3&bd=0&k=000000&f=&q=1&e=0&a=1&c=58457&w=385&h=96&align=center"></iframe>
	</div>
	<br>
	<div class="calendar col-lg-6" style="width: 465px">

		<div class="outer clearfix" id="calendarcontainer"> 

		</div>
	</div>
	<div class="col-lg-6">
		<div class="cntl">
			<span class="cntl-bar cntl-center">
				<span class="cntl-bar-fill"></span>
			</span>
			@for($i=0; $i<count($lists); $i++)
				<div class="cntl-state">
				    <div class="cntl-state">
				      <div class="cntl-content" >
				        <h4>{{ $lists[$i]->type }}：</h4>
				        <p>{{ $lists[$i]->content }}！</p>
				        <p class="text-right">{{ $lists[$i]->created_at }}</p>
				      </div>
				      <div class="cntl-icon cntl-center">{{ $i }}</div>
				    </div>
				</div>
			@endfor
			<div class="cntl-state">
		      <div class="cntl-content">
		        <h4></h4>
		        <p></p>
		      </div>
		      <div class="cntl-icon cntl-center"></div>
		    </div>
		</div>		
	</div>
</div>
@stop
@section('footJsFiles')
<script src="{{asset('public/js/Calendar.js')}}"></script>
<script src="{{asset('public/js/fun.js')}}"></script>
<script src="{{asset('public/js/sweetalert.js')}}"></script>
<script src="{{asset('public/js/jquery.cntl.min.js')}}"></script>
<script src="{{asset('public/js/vue.min.js')}}"></script>
@stop
@section('footJs')
<script>
    $(document).ready(function(e){
        $('.cntl').cntl({
            revealbefore: 300,
            anim_class: 'cntl-animate',
            onreveal: function(e){
                // console.log(e);
            }
        });
        var url = "{{ url('/memor') }}";
		var date = new Date();
		var year = date.getFullYear();
		var month = date.getMonth()+1;
		getMemo();
		var para={'c':'calendarcontainer',
				'y':year,
				'm':month,
				'a':{
				 'd1': year+'-01-01',//最早时间
				 'd2': year+'-12-31'//最晚时间
				 },
				'f':0,//显示双日历用1，单日历用0
				'clickfu':function (to) {//回调函数，to为点击对象，点击日期是调用的函数,参数to为点击的日期的节点对象
				    if(to.id!=""){
						swal({
						  title: "请输入",
						  text: "输入内容尽量少于五个字:",
						  type: "input",
						  showCancelButton: true,
						  closeOnConfirm: false,
						  confirmButtonText: '确认',
						  cancelButtonText: "取消",
						  inputPlaceholder: "写下你的备忘录"
						}, function (inputValue) {
						  if (inputValue === false) return false;
						  if (inputValue === "") {
						    swal.showInputError("输入内容不能为空!");
						    return false
						  }
						  var myFormData = new FormData();
						  myFormData.append('content', inputValue);
						  myFormData.append('date', to.id);
						  $.ajax({
							type: 'POST',
							url: url,
							data: myFormData,
							success: function(xhr){
								getMemo();
								swal('操作成功', '', 'success');
							}						  	
						  });
						});               	
				    }	 
				},
			 'showFu':function(d){	//回调函数，d为要显示的当前日期，主要用于判断是否要在该日期的格子里显示出指定的内容，在日期格子里额外显示内容的函数,返回值必须为字符串，参数d为显示的日期对象（日期类型）
			 	// alert(d);
			         var t=new Date();
			         var memorData = JSON.parse(sessionStorage.getItem('memorData'));
			         for($i=0; $i<memorData.memors.length; $i++){
			         	if(parseInt(memorData.memors[$i].month) == parseInt(d.getMonth()+1) &&parseInt(memorData.memors[$i].date) == parseInt(d.getDate())){
			         		return "<br/>"+memorData.memors[$i].content;
			         	}
			         }
					 if(t.toLocaleDateString()==d.toLocaleDateString()){		
					  return "<br/>今天";
					 }
					 else{
					 return "";	 
						 }
				 }		 
			}
        $(document).on('click', '.next', function(){
	        CreateCalendar(para,"para",'next');  	
        });
	    $(document).on('click', '.prev', function(){
	        CreateCalendar(para,"para",'pre');  	
        });
		function getMemo(){
			$.ajax({
				type: 'GET',
				url: url,
				success: function(xhr){
					sessionStorage.setItem('memorData', JSON.stringify(xhr));
					CreateCalendar(para,"para"); //参数前一个是对象，后一个是对象名称
				}
			}); 
		}
    });
</script>
@stop