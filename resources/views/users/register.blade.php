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
		<div class="col-sm-6">
			<div class="panel panel-warning">
				<div class="panel-heading">
					ข้อตกลงการใช้งาน
				</div>
				<div class="panel-body">
					{!! html_entity_decode($agreement) !!}
				</div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="panel panel-primary">
				<div class="panel-heading">
					ลงทะเบียน Step1
				</div>
				<div class="panel-body">
					{!! Form::open(array('url' => route('register'))) !!}
						{!! Form::hidden('step','2') !!}
						<fieldset>
							<legend>ตรวจสอบข้อมูลนักเรียน</legend>
							
							กรุณาระบุหมายเลขประจำตัวนักเรียน 5 หลัก หรือ หมายเลขประจำตัวประชาชน 13 หลัก
							<div class="input-group">
							 	{!! Form::text('number','',array('class' => 'form-control','placeholder' => 'ระบุข้อมูลที่นี่')) !!}
							  	<span  class="input-group-btn">{!! Form::submit('ตรวจสอบข้อมูล',array('class'=>'btn btn-success')) !!}</span>
							</div>	
							<br>
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
						</fieldset>
					{!! Form::close() !!}
					


					
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