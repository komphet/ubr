@extends('master')

@section('title')
	เพิ่มข้อมูลนักเรียน
@endsection

@section('breadcrumb')
 <li><a href="{{ route('member') }}">{{ Auth::user()->username }}</a></li>
 <li><a href="{{ route('insertStuden') }}">เพิ่มข้อมูลนักเรียน</a></li>
@endsection 

@section('content')

<style type="text/css">
	.input-group{
		margin-bottom:5px; 
	}
	.input-title{
		width:80px;
		text-align: left;;
	}


</style>
<?php
	if(isset($_POST['gradeYear'])){
		echo $_POST['gradeYear'];
	}
?>
<form action="http://ubr.local/admin/insertstuden" method="post">
<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
		<div class="panel panel-primary">
		  <div class="panel-heading">เพิ่มข้อมูลนักเรียน</div>
		  <div class="panel-body">
		  		<div class="input-group">
				  <span class="input-group-addon" id="basic-addon1"><div class="input-title">ปีจบการศึกษา</div></span>
				  <input value="{{ date('Y')+542 }}" type="text" class="form-control" name="gradeYear" aria-describedby="basic-addon1">
				</div>
		  		<div class="input-group">
				  <span class="input-group-addon"><div class="input-title">สายชั้น</div></span>
				  <select class="form-control" id="sel1" name="classRoom">
				  	@foreach($classTeachers as $classTeacher)
				    	<option value="{{$classTeacher->title}},{{$classTeacher->value}}">{{$classTeacher->title}}/{{$classTeacher->value}} {{$classTeacher->detail}}</option>
				    @endforeach
				  </select>
				</div>
				<div class="input-group">
				  <span class="input-group-addon" id="basic-addon1"><div class="input-title">เลขที่</div></span>
				  <input type="text" class="form-control" name="number" aria-describedby="basic-addon1">
				</div>
				<div class="input-group">
				  <span class="input-group-addon" id="basic-addon1"><div class="input-title">รหัสนักเรียน</div></span>
				  <input type="text" class="form-control" name="passwordstuden" aria-describedby="basic-addon1">
				</div>
				<div class="input-group">
				  <span class="input-group-addon" id="basic-addon1"><div class="input-title">รหัสประชาชน</div></span>
				  <input type="text" class="form-control" name="idCard" aria-describedby="basic-addon1">
				</div>
				<div class="input-group">
				  <span class="input-group-addon"><div class="input-title">คำนำหน้าชื่อ</div></span>
				  <select class="form-control" name="titleName" id="sel2">
				  	@foreach($titleNames as $titleName)
				    	<option value="{{$titleName->title}}">{{$titleName->title}}</option>
				    @endforeach
				  </select>
				</div>
				<div class="input-group">
				  <span class="input-group-addon" id="basic-addon1"><div class="input-title">ชื่อ</div></span>
				  <input type="text" class="form-control" name="name" aria-describedby="basic-addon1">
				</div>
				<div class="input-group">
				  <span class="input-group-addon" id="basic-addon1"><div class="input-title">นามสกุล</div></span>
				  <input type="text" class="form-control" name="lastname" aria-describedby="basic-addon1">
				</div>
				<button style="width:100%" class="btn btn-success">บันทึกข้อมูล</button>
		  </div>
		</div>
	</div>
</div>
</form>






@endsection