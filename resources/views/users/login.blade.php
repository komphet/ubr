@extends('master')

@section('title')
	Login
@endsection

@section('login')
	active
@endsection

@section('breadcrumb')
 <li><a href="{{ route('login') }}">Login</a></li>
@endsection 

@section('content')
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					ลงชื่อเข้าใช้
				</div>
				<div class="panel-body">
						<?php 
							if(isset($errors)){
								$errorMessages = array(
									'username' => $errors->first('username'),
									'password' => $errors->first('password'),
								);
							}else{
								$errorMessages = array(
									'username' =>  null,
									'password' =>  null,
								);
							}

						?>	
					<?php if($errorMessages['username'] != null) echo '<div class="alert alert-danger">'.$errorMessages['username'].'</div>'; ?>
					{!! Form::open() !!}
						@if(isset($_GET['redirect']))
							{!! Form::hidden('redirect',$_GET['redirect']) !!}
						@endif
						<div class="input-group <?php if($errorMessages['username'] != null) echo 'has-error'; ?>">
							<span class="input-group-addon" id="username-addon">
								<span class="glyphicon glyphicon-user" aria-hidden="true"></span>Username
							</span>	
							{!! Form::text('username','',array('class'=>'form-control','aria-describedby'=>'username-addon')) !!}	
						</div>
						
						<div class="input-group margin-top <?php if($errorMessages['password'] != null) echo 'has-error'; ?>">
							<span class="input-group-addon" id="password-addon ">
								<span class="glyphicon glyphicon-lock " aria-hidden="true"></span>Password
							</span>	
							{!! Form::password('password',array('class'=>'form-control','aria-describedby'=>'password-addon')) !!}
						</div>
						<?php if($errorMessages['password'] != null) echo '<p class="error">'.$errorMessages['password'].'</p>'; ?>
						<div class="margin-top" align="center">
							{!! Form::submit('ลงชื่อเข้าใช้',array('class'=>'btn btn-primary','style' => 'width:100%;')) !!} 
						</div>
						<div class="margin-top text" align="center">
							{!! Form::checkbox('remember','true') !!}ลงชื่อเข้าใช้เสมอ | {!! link_to_route('forgetpass','ลืมรหัสผ่าน') !!} หรือ {!! link_to_route('register','ลงทะเบียน') !!}
						</div>
						
					{!! Form::close() !!}
				</div>
				
			</div>
			
		</div>
	</div>
	

@endsection