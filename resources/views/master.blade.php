<!DOCTYPE html>
<html>
<head>
	<meta name="stats-in-th" content="0a69" />
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

		body{
			background: url(//{{ $_SERVER['SERVER_NAME'] }}/picture/bg.jpg) fixed top center;
		    background-size:cover;
		    background-repeat: no-repeat;
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
		      <a class="navbar-brand" href="/">UBR:Student System</a>
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      <ul class="nav navbar-nav">
		      	@if(Auth::check())
		      		<li class="@yield('member')"><a href="{{ route('member') }}">สมาชิก</a></li>
			        <li class="@yield('yearbook')"><a href="{{ route('yearbook') }}">หนังสือรุ่น</a></li>
			        @if(Auth::user()->admin)
			          	<li class="@yield('studen')"><a href="{{ route('studen') }}">จัดการนักเรียน</a></li>
			          	<li class="@yield('admin')"><a href="{{ route('admin') }}">ตั้งค่าระบบ</a></li>
			        @endif
		      	@endif
		      </ul>
		      <ul class="nav navbar-nav navbar-right">
		        @if(Auth::check())
		        	<li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
			          	{{ Auth::user()->username }}
			           <span class="caret"></span>
			           </a>
			          <ul class="dropdown-menu">
			            <li><a href="//{{$_SERVER['SERVER_NAME']}}/logout">ลงชื่อออก</a></li>
			          </ul>
			        </li>


		        	
		        @else
		        	<li class="@yield('register')" ><a href="{{route('register')}}">ลงทะเบียน</a></li>
		        	<li class="@yield('forgetpass')" ><a href="{{route('forgetpass')}}">ลืมรหัสผ่าน</a></li>
		        	<li class="@yield('login')" ><a href="{{route('login')}}">ลงชื่อเข้าใช้</a></li>
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
        <div class="container" align="center">
        	<hr width="50%">
            
            <b>&copy; 2015 โรงเรียนอุบลรัตน์พิทยาคม <br>
            สำนักงานเขตพื้นที่การศึกษามัธยมศึกษาเขต 25<br>
			316 หมู่ 2 ต.เขื่อนอุบลรัตน์ อ.อุบลรัตน์ จ.ขอนแก่น 40250<br>
			Tel : 043-446100,  Fax : 043-446100, Email: <a href="email::ubr2554@gmail.com"><!--email_off--> ubr2554@gmail.com<!--/email_off--></a>
			<br>
			<br>
            มีปัญหาการใช้งานกรุณาติดต่อผู้ดูแลระบบ : นายคมเพชร มีทรัพย์ <br>
            โทร. 08-0535-6935, Email: <a href="email::komphetmeesab@hotmail.com"><!--email_off--> komphetmeesab@hotmail.com<!--/email_off--></a>, Facebook: <a target="_blank" href="https://www.facebook.com/komdragon"> komdragon</a>, Line: komdragon</b>
            <br>
            <b>Web Developer</b>:
            นายคมเพชร มีทรัพย์ ม.6/1 เลขที่ 14,
            นายสหภาพ คำสุข ม.3/1 เลขที่ 6
            <br>
            <b>Web Information</b>:
            นายศราวุฒิ โพธิ์ภูมี ม.6/1 เลขที่ 6,
            นายจิตวัต ไสยันต์ ม.6/1 เลขที่ 1,
            นายพงพิพัฒน์ ธรรมลา ม.5/4 เลขที่ 7,
            นางสาวศศิณัฏฐา ทองเหลา ม.4/3 เลขที่ 14
            <br>
            <b>ในความดูแลของ</b>: อาจารย์ชนิกานต์ คะนนท์


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