@extends('master')

@section('title')
	Welcome

@endsection

@section('content')

		
<div class="row">
	<div class="col-sm-4">
		<div class="panel panel-info">
			<div class="panel-body" align="center">
				<div class="alert alert-warning">
					<b>เปิดระบบ Review หนังสือรุ่น<br> วันที่ 6 มีนาคม 2559</b>
					
				</div>
				<img src="//{{$_SERVER['SERVER_NAME']}}/picture/yearbook/pok1.JPG" class="img-responsive">
				<img src="//{{$_SERVER['SERVER_NAME']}}/picture/yearbook/y.JPG" class="img-responsive">


			</div>
		</div>
	</div>
	<div class="col-sm-8">			
			
		<div class="panel panel-info">
			<div class="panel-heading">
				<h2>รายชื่อผู้ที่ข้อมูลยังไม่สมบูรณ์</h2>
			</div>
			<div class="panel-body">
				<ul class="list-group">
				@foreach(App\SetupValue::where('slug','like','CLASS-TEACHER-%')->where('title','!=','0')->groupBy('title')->orderBy('title')->get() as $allClass)


					<li class="list-group-item">
					<h4>ชั้นมัธยมศึกษาปีที่ {{$allClass->title}}</h4>
					@foreach(App\SetupValue::where('slug','like','CLASS-TEACHER-%')->where('title','!=','0')->where('title','!=','0')->where('title',$allClass->title)->orderBy('value')->get() as $class)

						<?php
							$countStuden = App\User::where('class',$class->title)
												->where('room',$class->value)
												->where('CRNo','!=','0')
												->where(function($qq){
													$qq->where('picture','picture/yearbook/ubr.jpg')
													->orwhere('yearbook',false);
												})				
										        ->count()
												;
						?>
						<a href="{{route('checkstu',[$allClass->title,$class->value])}}">ห้อง {{ $class->value }} ครูที่ปรึกษา: {{ $class->detail }}</a>
						<span class="badge ">{{$countStuden}}</span><br>
					@endforeach
					</li>
				@endforeach
				</ul>
			</div>
			<div class="panel-body">
			<b>มีปัญหาการใช้งานกรุณาติดต่อผู้ดูแลระบบ : นายคมเพชร มีทรัพย์ โทร. 08-0535-6935, Email: komphetmeesab@hotmail.com, Facebook:komdragon, Line:komdragon</b>
			</div>
		</div>
	</div>
</div>

				<ul class="list-group" > 
					<li class="list-group-item list-group-item-info"><h4>5 ขั้นตอนการใช้งานง่ายๆ</h4></li>
					<li class="list-group-item">
						<div class="row">
							<div class="col-sm-9">
							<a target="_blank" href="{{route('register')}}">
								<img src="//{{$_SERVER['SERVER_NAME']}}/picture/yearbook/howto/1.JPG" class="img-responsive">
							</a>
							</div>
							<div class="col-sm-3">
								<a target="_blank" href="{{route('register')}}"><b>ขั้นตอนที่ 1 ลงทะเบียน [คลิกที่นี่]</b></a>
								ระบุรหัสประจำตัวนักเรียน 5 หลักหรือรหัสประจำตัวประชาชน 13 หลัก แล้วกด "ตรวจสอบข้อมูล" 
							</div>
						</div>
						
					</li>
					<li class="list-group-item">
						<div class="row">
							<div class="col-sm-9">
								<img src="//{{$_SERVER['SERVER_NAME']}}/picture/yearbook/howto/2.JPG" class="img-responsive">
							</div>
							<div class="col-sm-3">
								<b>ขั้นตอนที่ 2 ตรวจสอบข้อมูล</b>
								ระบุข้อมูลให้ครบ "ติดต่ออื่นๆ" สามารถระบุ Facebook หรือ Line ได้ เช่น Facebook:komdragon "Username" ใช้สำหรับ Login เข้าสู่ระบบ ใช้ภาษาอังกฤษและตัวเลขเท่านั้น
								"Password" ให้ระบุทั้ง 2 ช่องเหมือนกัน 4-20 ตัวอักษร เสร็จแล้วกด "ลงทะเบียน"
							</div>
						</div>
							

						
					</li>
					<li class="list-group-item">
						<div class="row">
							<div class="col-sm-9">
								<a target="_blank" href="{{route('member',['action'=>1])}}"><img src="//{{$_SERVER['SERVER_NAME']}}/picture/yearbook/howto/3.JPG" class="img-responsive">
								</a>
							</div>
							<div class="col-sm-3">
								<a target="_blank" href="{{route('member',['action'=>1])}}">
								<b>ขั้นตอนที่ 3 เพิ่มรูปภาพ [คลิกที่นี่]</b></a>
								เข้าไปที่เมนูสมาชิก แล้วคลิกที่ "เปลี่ยนภาพ"
							</div>
						</div>
						
					</li>
					<li class="list-group-item">
						<div class="row">
							<div class="col-sm-9">
								<a target="_blank" href="{{route('member',['action'=>1])}}"><img src="//{{$_SERVER['SERVER_NAME']}}/picture/yearbook/howto/4.JPG" class="img-responsive">
								</a>
							</div>
							<div class="col-sm-3">
								<a target="_blank" href="{{route('member',['action'=>1])}}">
								<b>ขั้นตอนที่ 4 เลือกรูปภาพ [คลิกที่นี่]</b></a>
								จากนั้นเลือกรูปภาพที่ต้องการ แล้วกด "บันทึกภาพ"
							</div>
						</div>
						
						

					</li>
					<li class="list-group-item">
						<div class="row">
							<div class="col-sm-9">
								<a target="_blank" href="{{route('yearbook')}}"><img src="//{{$_SERVER['SERVER_NAME']}}/picture/yearbook/howto/5.JPG" class="img-responsive">
								</a>
							</div>
							<div class="col-sm-3">
								<a target="_blank" href="{{route('yearbook')}}">
								<b>ขั้นตอนที่ 5 จัดทำหนังสือรุ่น [คลิกที่นี่]</b>
								</a>
								ไปที่เมนู "หนังสือรุ่น" ใส่ข้อมูลให้ครบถ้วนแล้วกด "จัดทำหนังสือรุ่น"
							</div>
						</div>
						
						
					</li>
				</ul>

@endsection