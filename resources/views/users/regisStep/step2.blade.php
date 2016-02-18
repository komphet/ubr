@extends('master')

@section('title')
	Register
@endsection

@section('register')
 active
@endsection 

@section('breadcrumb')
 <li><a href="{{ route('register') }}">Register</a></li>
@endsection 

@section('content')
<style type="text/css">
	
	.input-group,select,button{
		margin-bottom: 5px;
	}
</style>
	<div class="row">
		<div class="col-sm-5">
			<div class="panel panel-warning">
				<div class="panel-heading">
					ข้อตกลงการใช้งาน
				</div>
				<div class="panel-body">
					{!! html_entity_decode($agreement) !!}
				</div>
			</div>
		</div>
		<div class="col-sm-7">
			<div class="panel panel-primary">
				<div class="panel-heading">
					ลงทะเบียน Step2 
				</div>
				<div class="panel-body">
					{!! Form::open(array('url' => route('register'))) !!}
					{!! Form::hidden('step','3') !!}
					{!! Form::hidden('number',$request['number']) !!}
					{!! Form::hidden('id',$memberDetail->id) !!}
						<fieldset>
							<legend>ยืนยันข้อมูลนักเรียน <span style="color:red;font-size:0.7em">* จำเป็นต้องระบุข้อมูล</span></legend>
							
							<div class="row">
								<div class="col-sm-12">
									<div class="alert alert-info" align="center">
										หมายเลขประจำตัวนักเรียน <strong>{{ $memberDetail->studenNo }}</strong>, 
										หมายเลขประจำตัวประชาชน <strong>{{ $memberDetail->idCardNo }}</strong>,
										<br>
										ชั้นมัธยมศึกษาปีที่ <strong>{{ $memberDetail->class }}/{{ $memberDetail->room }}</strong>,
										เลขที่ <strong>{{ $memberDetail->CRNo }}</strong>,
										ปีจบการศึกษา <strong>{{ $memberDetail->gradYear }}</strong>
										<br>
										<span style="color:red">หากข้อมูลไม่ถูกต้องกรุณาติดต่อผู้ดูแลระบบ</span>

										
									</div>
								</div>
								<div class="col-sm-12 col-md-3">
									<select name="titleName" class="form-control">
										<option <?php if($memberDetail->titleName == 'นาย') echo 'selected'; ?> value="นาย">นาย</option>
										<option <?php if($memberDetail->titleName == 'นางสาว') echo 'selected'; ?> value="นางสาว">นางสาว</option>
									</select>
								</div>
								<div class="col-sm-12 col-md-4">
							 		{!! Form::text('name',$memberDetail->name,array('class' => 'form-control','placeholder' => 'ชื่อ')) !!}	
								</div>
								<div class="col-sm-12 col-md-5">
							 		{!! Form::text('lastname',$memberDetail->lastname,array('class' => 'form-control','placeholder' => 'นามสกุล')) !!}	
								</div>
								<div class="col-sm-12">
									<div class="input-group">
										<span class="input-group-addon">ที่อยู่</span>
							 			{!! Form::text('address',$memberDetail->address,array('class' => 'form-control','placeholder' => 'บ้านเลขที่,หมู่,หมู่บ้าน,ตำบล,อำเภอ,จังหวัด,รหัสไปรษณีย์')) !!}	
									</div>
								</div>
								<div class="col-sm-6">
									<div class="input-group">
										<span class="input-group-addon">โทรศัพท์</span>
							 			{!! Form::text('tel',$memberDetail->tel,array('class' => 'form-control','placeholder' => 'เช่น 08-000-0000')) !!}	
									</div>
								</div>
								<div class="col-sm-6">
									<div class="input-group">
										<span class="input-group-addon">ติดต่ออื่นๆ</span>
							 			{!! Form::text('contact',$memberDetail->contact,array('class' => 'form-control','placeholder' => 'เช่น Facebook,Line')) !!}	
									</div>
								</div>

								<!--<div class="col-sm-12 col-md-2">
									<div class="input-group">
										<span class="input-group-addon">หมายเลขประจำตัวนักเรียน</span>
							 			{!! Form::text('number',$memberDetail->name,array('class' => 'form-control','placeholder' => 'ชื่อ')) !!}	
										
									</div>
								</div>
								-->
							</div>
						</fieldset>
						<fieldset>
							<legend>ข้อมูลระบบ <span style="color:red;font-size:0.7em">* จำเป็นต้องระบุข้อมูล</span></legend>
							
							<div class="row">
								<div class="col-sm-6">
									<div class="input-group">
										<span class="input-group-addon">Email</span>
							 			{!! Form::text('email',$memberDetail->email,array('class' => 'form-control','placeholder' => 'เช่น abc@def.com')) !!}	
									</div>
								</div>
								<div class="col-sm-6">
									<div class="input-group">
										<span class="input-group-addon">Username</span>
							 			{!! Form::text('username',$memberDetail->username,array('class' => 'form-control','placeholder' => '4-20 ตัวเลขหรือตัวอักษรภาษาอังกฤษเท่านั้น!')) !!}	
									</div>
								</div>
								<div class="col-sm-6">
									<div class="input-group">
										<span class="input-group-addon">Password</span>
										<input class="form-control" placeholder="4-30 ตัวเลขหรือตัวอักษรภาษาอังกฤษเท่านั้น!" name="password" type="password" value="">
							 			
									</div>
								</div>
								<div class="col-sm-6">
									<div class="input-group">
										<span class="input-group-addon">Re-Password</span>
							 			<input class="form-control" placeholder="4-30 ตัวเลขหรือตัวอักษรภาษาอังกฤษเท่านั้น!" name="password_confirmation" type="password" value="">
									</div>
								</div>
								<div class="col-sm-12" align="center">
									<button type="submit" class="btn btn-success" style="width:100%">ลงทะเบียน</button>
								</div>


							</div>
						</fieldset>
					{!! Form::close() !!}
					
					@if(count($errors->getMessages()) != 0)
					<div class="alert alert-danger" align="center">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						@foreach($errors->getMessages() as $error)
							@foreach($error as $message)
								<b>{{$message}}</b>
							@endforeach
						@endforeach
					</div>
					@endif

					
				</div>
			</div>
		</div>
	</div>

<script type="text/javascript">
$(document).ready(function(){

	$('.btn').bind('click',function(){
		$(this).val('Loading.....').addClass('disabled');

	});
});
</script>
@endsection