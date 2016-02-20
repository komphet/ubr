@extends('master')

@section('title')
	ลิมรหัสผ่าน
@endsection

@section('forgetpass')
	active
@endsection

@section('breadcrumb')
 <li><a href="{{ route('forgetpass') }}">ลืมรหัสผ่าน</a></li>
@endsection 

@section('content')
<style type="text/css">
	a{
		cursor: pointer;
	}
	.input-group{
		margin-bottom:5px; 
	}
	.title{
		width: 130px;
		text-align: left;
	}
</style>
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					ลืมรหัสผ่าน
				</div>
				<div class="panel-body">
				@if(count($errors) > 0)
					<div class="alert alert-danger">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<ul>
							@foreach($errors->all() as $error)
								<li>{{$error}}</li>
							@endforeach
						</ul>
					</div>
				@endif
				{!! Form::open() !!}
					{!! Form::hidden('column1','studenNo',array('class'=>'column1')) !!}
					{!! Form::hidden('column2','idCardNo',array('class'=>'column2')) !!}
					<div class="input-group">
				      <div class="input-group-btn">
				        <button type="button" class="btn btn-default dropdown-toggle title " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="title1">รหัสนักเรียน</span> <span class="caret"></span></button>
				        <ul class="dropdown-menu">
				          <li>
				          	<a data-column="username" onclick="$('.title1').text($(this).text());$('.column1').val($(this).attr('data-column'))">Username</a>
				          </li>
				          <li>
				          	<a data-column="studenNo" onclick="$('.title1').text($(this).text());$('.column1').val($(this).attr('data-column'))">รหัสนักเรียน</a>
				          </li>
				        </ul>
				      </div><!-- /btn-group -->
				      <input name="input1" type="text" class="form-control">
				    </div><!-- /input-group -->
				    <div class="input-group">
				      <div class="input-group-btn">
				        <button type="button" class="btn btn-default dropdown-toggle title" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="title2">รหัสประชาชน</span> <span class="caret"></span></button>
				        <ul class="dropdown-menu">
				          <li>
				          	<a data-column="email" onclick="$('.title2').text($(this).text());$('.column2').val($(this).attr('data-column'))">Email</a>
				          </li>
				          <li>
				          	<a data-column="idCardNo" onclick="$('.title2').text($(this).text());$('.column2').val($(this).attr('data-column'))">รหัสประชาชน</a>
				          </li>
				        </ul>
				      </div><!-- /btn-group -->
				      <input name="input2" type="text" class="form-control" aria-label="...">
				    </div><!-- /input-group -->
				    <button onclick="if(!confirm('คุณต้องการรีเซ็ตรหัสผ่านหรือไม่?')){return false;}" type="submit" style="width: 100%" class="btn btn-warning">รีเซ็ตรหัสผ่าน</button>
				    <div class="margin-top text" align="center">
							{!! link_to_route('login','ลงชื่อเข้าใช้') !!} หรือ {!! link_to_route('register','ลงทะเบียน') !!}
					</div>
				</div>
				{!! Form::close() !!}
			</div>
			
		</div>
	</div>
	

@endsection