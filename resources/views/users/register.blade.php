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
	<div class="row">
		<div class="col-sm-6 col-sm-offset-3">
			<div class="panel panel-primary">
				<div class="panel-heading">
					ลงทะเบียน Step1
				</div>
				<div class="panel-body">
					{!! Form::open(array('url' => route('register'))) !!}
						{!! Form::hidden('step','2') !!}
						<fieldset>
							<legend>ตรวจสอบข้อมูลนักเรียน</legend>
							@if(count($errors) > 0)
							<div class="alert alert-danger" align="center">
								<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								
								@foreach($errors->all() as $message)
									<b>{{$message}}</b>
								@endforeach
								
							</div>
							@endif
							กรุณาระบุหมายเลขประจำตัวนักเรียน 5 หลัก หรือ หมายเลขประจำตัวประชาชน 13 หลัก
							<div class="input-group">
							 	{!! Form::text('number','',array('class' => 'form-control','placeholder' => 'ระบุข้อมูลที่นี่')) !!}
							  	<span  class="input-group-btn">{!! Form::submit('ตรวจสอบข้อมูล',array('class'=>'btn btn-success')) !!}</span>
							</div>	
							
						</fieldset>
					{!! Form::close() !!}
					
					<div class="margin-top text" align="center">
							{!! link_to_route('login','ลงชื่อเข้าใช้') !!} หรือ {!! link_to_route('forgetpass','ลืมรหัสผ่าน') !!}
					</div>

					
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