<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>漂流的木头</title>
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="">
	<meta name="description" content="">

	<!-- stylesheet css -->
	<!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
	<link rel="stylesheet" type="text/css" href="{{asset('public/resume/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('public/resume/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('public/resume/css/templatemo-blue.css')}}">
</head>
<body data-spy="scroll" data-target=".navbar-collapse">

<!-- preloader section -->
<div class="preloader">
	<div class="sk-spinner sk-spinner-wordpress">
       <span class="sk-inner-circle"></span>
     </div>
</div>
<div id='app'>
<!-- header section -->
<header>
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<img src="{{asset('public/resume/images/avatar.jpg')}}" class="img-responsive img-circle tm-border" alt="templatemo easy profile">
				<hr>
				<h1 class="tm-title bold shadow">你好, 我是@{{data.name}}</h1>
				<h1 class="white bold shadow">@{{data.professional}}</h1>
			</div>
		</div>
	</div>
</header>

<!-- about and skills section -->
<section class="container">
	<div class="row">
		<div class="col-md-6 col-sm-12">
			<div class="about">
				<h3 class="accent">自我介绍</h3>
				<h2>@{{data.professional}}</h2>
				<p>@{{data.introduction}}</p>
			</div>
		</div>
		<div class="col-md-6 col-sm-12">
			<div class="skills">
				<h2 class="white">技能</h2>
				<div v-for="value in data.skills">
					<strong>@{{ value.name }}</strong>
					<span class="pull-right">@{{ value.degree }}%</span>
						<div class="progress">
							<div class="progress-bar progress-bar-primary" role="progressbar" 
							v-bind:aria-valuenow="value.degree" aria-valuemin="0" aria-valuemax="100"  v-bind:style="{ width: value.degree + '%' }">
							</div>
						</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- <div class="copyrights">Collect from <a href="http://www.cssmoban.com/" >企业网站模板</a></div> -->
<!-- education and languages -->
<section class="container">
	<div class="row">
		<div class="col-md-8 col-sm-12">
			<div class="education">
				<h2 class="white">教育经历</h2>
					<div class="education-content" v-for="value in data.education">
						<h4 class="education-title accent">@{{ value.name }} @{{ value.degree }}</h4>
							<div class="education-school">
								<h5>@{{ value.major }}</h5><span></span>
								<h5>@{{ value.startTime }} - @{{ value.endTime }}</h5>
							</div>
						<p class="education-description">@{{ value.introduction }}</p>
					</div>
			</div>
		</div>
		<div class="col-md-4 col-sm-12">
			<div class="languages">
				<h2>项目经历</h2>
					<ul>
{{-- 						<li>设计师网站 / <a href="http://www.yingxiongshe.com">英雄设</a></li>
						<li>个人博客 / <a href="#">漂流的木头</a></li> --}}
						<li v-for="value in data.project">@{{ value.description }} / <a v-bind:href="value.url">@{{ value.name }}</a></li>
					</ul>
			</div>
		</div>
	</div>
</section>

<!-- contact and experience -->
<section class="container">
	<div class="row">
		<div class="col-md-4 col-sm-12">
			<div class="contact">
				<h2>联系方式</h2>
					<p><i class="fa fa-map-marker"></i> @{{data.address}}</p>
					<p><i class="fa fa-phone"></i> @{{data.Tel}}</p>
					<p><i class="fa fa-envelope"></i> @{{data.Email}}</p>
					<p><i class="fa fa-globe"></i> <a v-bind:href="data.url">@{{data.url}}</a></p>
			</div>
		</div>
		<div class="col-md-8 col-sm-12">
			<div class="experience">
				<h2 class="white">工作经历</h2>
					<div class="experience-content" v-for="value in data.experience">
						<h4 class="experience-title accent">@{{ value.professional }}</h4>
						<h5>@{{ value.company }}</h5><span></span>
						<h5 v-if="value.endTime == null">@{{ value.startTime }} - 至今</h5>
						<h5 v-else>@{{ value.startTime }} - @{{ value.endTime }}</h5>
						<p class="education-description">@{{ value.duty }}</p>
					</div>
			</div>
		</div>
	</div>
</section>

<!-- footer section -->
<footer>
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<p>你可以通过上面的联系方式找到我,如果你对本人感兴趣,欢迎随时联系</p>
				<ul class="social-icons">
				</ul>
			</div>
		</div>
	</div>
</footer>
</div>
<!-- javascript js -->	
<script src="{{asset('public/resume/js/jquery.js')}}"></script>
<script src="{{asset('public/resume/js/bootstrap.min.js')}}"></script>	
<script src="{{asset('public/resume/js/jquery.backstretch.min.js')}}"></script>
<script src="{{asset('public/js/custom.js')}}"></script>
<script src="{{asset('public/js/vue.min.js')}}"></script>
<script type="text/javascript">
	$(document).ready(function () {
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': "{{ csrf_token() }}"
			},
			processDate: false,
			contentType: false
		}); 
	});
	var url = '{{ url('/myMsg') }}';
	new Vue({
		el: '#app',
		data:{data:{}},
        beforeCreate:function(){
            var _self=this;
            $.get(url,function(data){
                _self.data=data;
                // console.log(_self.data);
            })
        }		
	});

</script>

</body>
</html>