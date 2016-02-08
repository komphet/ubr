@extends('master')

@section('title')
	เพิ่มข้อมูลนักเรียน
@endsection

@section('content')

<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
		<div class="panel panel-primary">
		  <div class="panel-heading">เพิ่มข้อมูลนักเรียน</div>
		  <div class="panel-body">
		   		<div class="input-group">
				  <span class="input-group-addon">คำนำหน้าชื่อ</span>
				  <select class="form-control" id="sel1">
				    <option>นาย</option>
				    <option>นางสาว</option>
				    <option>เด็กชาย</option>
				    <option>เด็กหญิง</option>
				  </select>
				</div>
				<div class="input-group">
				  <span class="input-group-addon" id="basic-addon1">ชื่อ</span>
				  <input type="text" class="form-control" placeholder="username" aria-describedby="basic-addon1">
				</div>
				<div class="input-group">
				  <span class="input-group-addon" id="basic-addon1">นามสกุล</span>
				  <input type="text" class="form-control" placeholder="lastname" aria-describedby="basic-addon1">
				</div>
				<div class="input-group">
				  <span class="input-group-addon" id="basic-addon1">รหัสบัตรประจำตัวประชาชน</span>
				  <input type="text" class="form-control" placeholder="idcard" aria-describedby="basic-addon1">
				</div>
				<div class="input-group">
				  <span class="input-group-addon" id="basic-addon1">รหัสนักเรียน</span>
				  <input type="text" class="form-control" placeholder="passwordstuden" aria-describedby="basic-addon1">
				</div>
				<div class="input-group">
				  <span class="input-group-addon" id="basic-addon1">เลขที่</span>
				  <input type="text" class="form-control" placeholder="number" aria-describedby="basic-addon1">
				</div>
		  </div>
		</div>
	</div>
</div>






@endsection