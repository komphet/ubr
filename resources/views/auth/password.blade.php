@extends('master')

@section('title')
	Reset Password
@endsection

@section('content')
<form method="POST" action="/password/email">
    {!! csrf_field() !!}
		<div class="col-md-4 col-md-offset-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					รีเซตรหัสผ่าน Akicosshop
				</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
						</div>
				    @endif
					<div>
				        <div class="input-group margin-top <?php if(count($errors) > 0) echo 'has-error'; ?>">
				        	<span class="input-group-addon" id="email-addon ">
				        		<span class="glyphicon glyphicon-envelope " aria-hidden="true"></span>
							</span>	
				        	<input class="form-control" aria-describedby="email-addon" placeholder="กรุณาระบุอีเมลล์" type="email" name="email" value="{{ old('email') }}">
				        </div>
				    </div>

				    <div>
				        <button type="submit" class="btn btn-primary margin-top" style="width:100%" >
				            รีเซตรหัสผ่าน
				        </button>
				    </div>

				</div>
			</div>
		</div>
    
</form>


@endsection