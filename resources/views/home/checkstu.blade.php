@extends('master')

@section('title')
	รายชื่อผู้ที่ข้อมูลยังไม่สมบูรณ์ {{$classPar}}/{{$roomPar}}
@endsection

@section('forgetpass')
	active
@endsection

@section('breadcrumb')
 <li><a href="{{ route('checkstu',['class'=>$classPar,'room'=>$roomPar]) }}">รายชื่อผู้ที่ข้อมูลยังไม่สมบูรณ์ {{$classPar}}/{{$roomPar}}</a></li>
@endsection 

@section('content')
<div class="row">
	<div class="col-sm-3">
		
				<ul class="list-group">
				@foreach(App\SetupValue::where('slug','like','CLASS-TEACHER-%')->where('title','!=','0')->groupBy('title')->orderBy('title')->get() as $allClass)


					<li class="list-group-item">
					<h4>ชั้นมัธยมศึกษาปีที่ {{$allClass->title}}</h4>
					@foreach(App\SetupValue::where('slug','like','CLASS-TEACHER-%')->where('title','!=','0')->where('title','!=','0')->where('title',$allClass->title)->orderBy('value')->get() as $class)

						<?php
							$countStuden = App\User::where('class',$class->title)
												->where('room',$class->value)
												->where('CRNo','!=','00')
												->where(function($qq){
													$qq->where('picture','picture/yearbook/ubr.jpg')
													->orwhere('yearbook',false);
												})				
										        ->count()
												;
						?>
						<a href="{{route('checkstu',[$allClass->title,$class->value])}}">ห้อง {{ $class->title }}/{{ $class->value }}</a>
						<span class="badge ">{{$countStuden}}</span><br>
					@endforeach
					</li>
				@endforeach
				</ul>
		

	</div>
	<div class="col-sm-9">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4>รายชื่อผู้ที่ข้อมูลยังไม่สมบูรณ์ {{ $classPar }}/{{ $roomPar }}</h4>
			</div>
			<table class="table">
				<tr>
					<th>เลขที่</th>
					<th>ชื่อ</th>
					<th>นามสกุล</th>
					<th>ลงทะเบียน</th>
					<th>เพิ่มรูปภาพ</th>
					<th>หนังสือรุ่น</th>
				</tr>
				@foreach($lists as $list)
				<tr>
					<td>{{$list->CRNo}}</td>
					<td>{{$list->titleName}} {{$list->name}} </td>
					<td>{{$list->lastname}}</td>
					<td>
						@if($list->active)
							<span class="glyphicon glyphicon-ok success" style="color:green"></span>
						@else
							<span class="glyphicon glyphicon-remove danger" style="color:red"></span>
						@endif
					</td>
					<td>
						@if($list->picture != 'picture/yearbook/ubr.jpg')
							<span class="glyphicon glyphicon-ok success" style="color:green"></span>
						@else
							<span class="glyphicon glyphicon-remove danger" style="color:red"></span>
						@endif
					</td>
					<td>
						@if($list->yearbook)
							<span class="glyphicon glyphicon-ok success" style="color:green"></span>
						@else
							<span class="glyphicon glyphicon-remove danger" style="color:red"></span>
						@endif
					</td>
				</tr>
				@endforeach
			</table>
		</div>
	</div>

</div>
@endsection 
