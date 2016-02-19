<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>UBR - @yield('title')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <meta name="csrf-token" content="{!! Session::token() !!}"> 
	<style type="text/css">
		@font-face {
		 font-family: 'ThaiSans Neue';
		 src: url("//{{ $_SERVER['SERVER_NAME'] }}/fonts/ThaiSansNeue-Bold.ttf") /* TTF file for CSS3 browsers */
		}
		@font-face {
		 font-family: 'ThaiSans Neue';
		 src: url("//{{ $_SERVER['SERVER_NAME'] }}/fonts/ThaiSansNeue-Bold.eot") /* eot file for IE browsers */
		}
		@font-face {
		 font-family: 'ThaiSans Neue';
		 src: url("//{{ $_SERVER['SERVER_NAME'] }}/fonts/ThaiSansNeue-Bold.woff") /* woff file for modern browsers */
		}
		@font-face {
		 font-family: DSN RatBuRaNa;
		 src: url("//{{ $_SERVER['SERVER_NAME'] }}/fonts/DSNRBRN_.TTF") /* TTF file for CSS3 browsers */
		}
		@font-face {
		 font-family: DSN RatBuRaNa;
		 src: url("//{{ $_SERVER['SERVER_NAME'] }}/fonts/DSNRBRN_.eot") /* eot file for IE browsers */
		}
		@font-face {
		 font-family: DSN RatBuRaNa;
		 src: url("//{{ $_SERVER['SERVER_NAME'] }}/fonts/DSNRBRN_.woff") /* woff file for modern browsers */
		}

		@font-face {
		 font-family: Browallia New;
		 src: url("//{{ $_SERVER['SERVER_NAME'] }}/fonts/browab.TTF") /* TTF file for CSS3 browsers */
		}
		@font-face {
		 font-family: Browallia New;
		 src: url("//{{ $_SERVER['SERVER_NAME'] }}/fonts/browab.eot") /* eot file for IE browsers */
		}
		@font-face {
		 font-family: Browallia New;
		 src: url("//{{ $_SERVER['SERVER_NAME'] }}/fonts/browab.woff") /* woff file for modern browsers */
		}


	</style>


	<link media="all" type="text/css" rel="stylesheet" href="//{{ $_SERVER['SERVER_NAME'] }}/bootstrap/css/bootstrap.min.css">
	<link media="all" type="text/css" rel="stylesheet" href="//{{ $_SERVER['SERVER_NAME'] }}/datepicker/css/datepicker.css">
	<link media="all" type="text/css" rel="stylesheet" href="//{{ $_SERVER['SERVER_NAME'] }}/css/css.css">

	<script src="//{{ $_SERVER['SERVER_NAME'] }}/js/jquery-2.1.4.min.js"></script>
	<script src="//{{ $_SERVER['SERVER_NAME'] }}/bootstrap/js/bootstrap.min.js"></script>
	<script src="//{{ $_SERVER['SERVER_NAME'] }}/datepicker/js/bootstrap-datepicker.js"></script>
	<script src="//{{ $_SERVER['SERVER_NAME'] }}/js/jquery.form.js"></script>
	<script src="//{{ $_SERVER['SERVER_NAME'] }}/js/script.js"></script>
</head>
<body>
		@section('navbar')
		<nav class="navbar navbar-default navbar-fixed-top">
		  <div class="container">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="/">UBR:Studen System</a>
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav navbar-right">
		        @if(Auth::check())
		        	<li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			          	{{ Auth::user()->username }}
			           <span class="caret"></span>
			           </a>
			          <ul class="dropdown-menu">
			          	<li><a href="{{ route('member') }}">ข้อมูลสมาชิก</a></li>
			          	<li><a href="{{ route('yearbook') }}">หนังสือรุ่น</a></li>
			          	@if(Auth::user()->admin)
			          		<li role="separator" class="divider"></li>
			          		<li><a href="{{ route('studen') }}">จัดการนักเรียน</a></li>
			          		<li><a href="{{ route('admin') }}">ตั้งค่าระบบ</a></li>
			          	@endif
			            <li role="separator" class="divider"></li>
			            <li><a href="//{{$_SERVER['SERVER_NAME']}}/logout">ลงชื่อออก</a></li>
			          </ul>
			        </li>


		        	
		        @else
		        	<li class="@yield('register')" ><a href="/register">ลงทะเบียน</a></li>
		        	<li class="@yield('login')" ><a href="/login">ลงชื่อเข้าใช้</a></li>
		        @endif
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
		@show
		<br>
		<br>
		<br>
		<br>
		<div class="container">
			<ol class="breadcrumb">
			  <li><a href="//{{ $_SERVER['SERVER_NAME'] }}/home">Home</a></li>
			  @yield('breadcrumb')
			</ol>
            @yield('content')
        </div>
        @yield('contentBottom')
        <div class="container">
            <hr>
            &copy; 2015 โรงเรียนอุบลรัตน์พิทยาคม

        </div>
	
	
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
	$('.datepicker').each(function(){
		$(this).datepicker({
			format: "yyyy-mm-dd",
		    todayHighlight: true
		});
	});
	
});
</script>
</body>
</html>