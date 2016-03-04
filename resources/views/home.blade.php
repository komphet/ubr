@extends('master')

@section('title')
	Welcome

@endsection

@section('content')
								@if(count($errors->all()) != 0)
										<div class="alert alert-danger" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										  <ul>
										  	@foreach($errors->all() as $massage)
										  		<li>{{$massage}}</li>
										  	@endforeach
										  </ul>
										</div>
								@endif
		
<div class="row">
	<div class="col-sm-4">
		<div class="panel panel-info">
			<div class="panel-body" align="center">
				<a class="btn btn-info" style="width: 100%" target="_blank" href="https://drive.google.com/file/d/0B55b_r3CwbUaYmg3MWZuQk43ODQ/view?usp=sharing"><h1>คู่มือการใช้งาน</h1></a>
				<br>
				<br>
				<img src="//{{$_SERVER['SERVER_NAME']}}/picture/yearbook/pok1.jpg" class="img-responsive">
				<img src="//{{$_SERVER['SERVER_NAME']}}/picture/yearbook/y.jpg" class="img-responsive">
				

			</div>
		</div>
	</div>
	<div class="col-sm-8">
		@if(!Auth::check())		
		<div class="row">
			<div class="col-sm-6">
				<a class="btn btn-warning" style="width: 100%" href="{{route('register')}}"><h1>ลงทะเบียน</h1></a>
			</div>
			<div class="col-sm-6">
				<a class="btn btn-success" style="width: 100%" href="{{route('login')}}"><h1>ลงชื่อเข้าใช้</h1></a>
			</div>
		</div>
		<br>
		@endif
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
												->where('CRNo','!=','00')
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
			<b>มีปัญหาการใช้งานกรุณาติดต่อผู้ดูแลระบบ : นายคมเพชร มีทรัพย์ <br>
            โทร. 08-0535-6935, Email: <a href="email::komphetmeesab@hotmail.com"><!--email_off--> komphetmeesab@hotmail.com<!--/email_off--></a>, Facebook: <a target="_blank" href="https://www.facebook.com/komdragon"> AkimotoAkira Hoshi No Chikara</a>, Line: komdragon</b>
			</div>
		</div>
	</div>
</div>	

	<style type="text/css">
		.q-box-1{
			width: 100%;
			padding: 10px;
			background: #222244;
			border: #fff 1px solid;
			color: #fff;
			box-shadow: #717171 3px 3px 0px;
			margin-bottom: 20px;
		}
		.q-box-2{
			width: 100%;
			padding: 10px;
			background: #193366;
			border: #fff 1px solid;
			color: #fff;
			box-shadow: #717171 3px 3px 0px;
			margin-bottom: 20px;
		}
		.q-box-title{
			color: #ffff00;
			font-size: 1.5em;

		}
		.q-box-bottom,.textPost{
			color: #bfbfda;
			font-size: 0.89em;
		}
		.img-post{
			border: 1px #fff solid;
		}
		.post-box{
			margin-bottom: 20px;
		}
		.input-repost{
			background: #193366;
			color: #fff;
			width: 100%;
			padding: 10px;
			border: 0;
		}

	</style>
		@if(count($questions) != 0)
			@foreach($questions as $question)
				@if($question->subId == 0)
					<div class="q-box-1">
						
						<table width="100%">
							<tr>
								<td>
								<div class="q-box-title">
									{{$question->title}}
								</div>
								</td>
								<td align="right">
								@if(Auth::check())
									@if(Auth::user()->admin || Auth::user()->id == $question->memberId)
										<a style="color: #fff;" href="{{route('questionDel')}}?id={{$question->id}}" 
										onclick="if(!confirm('คุณต้องการลบโพสต์นี้หรือไม่?')){return false;}">
										<span class="glyphicon glyphicon-trash"></span>
										</a>
									@endif
								@endif
								</td>
							</tr>
						</table>
						
						<div style="color: #969696; font-size: 0.9em;">โพสที่ {{$question->id}}</div>
						<br>
						<div class="q-box-detail">{!!$question->detail!!}</div>
						<br>
						<div class="q-box-bottom">
							<?php
								$memberCh = App\User::where('id',$question->memberId)->first();
								$dateCreate = strtotime($question->created_at);
								$date = date('j/n/Y',$dateCreate);
								$time = date('H:i',$dateCreate);
							?>
							<table width="100%">
								<tr>
									<td>
										<table cellpadding="5" cellspacing="5"> 
											<tr>
												<td style="padding: 5px" valign="top">
													<img class="img-post" src="/{{$memberCh->picture}}" width="30">
												</td>
												<td style="padding: 5px"  valign="top">
														สมาชิกหมายเลข {{$memberCh->id}} | {{$memberCh->username}}
													<br>
													เมื่อ {{$date}} เวลา {{$time}} น.
												</td>
											</tr>
										</table>
									</td>
									<td align="right">
									@if(Auth::check())
										<a class="textPost" style="cursor: pointer;" 
										onclick="$('.post-box-{{$question->id}}').toggle()">
										<span class="glyphicon glyphicon-plus"></span> ตอบกลับ
										</a>
									@else
										ลงชื่อเข้าใช้เพื่อตอบกลับ
									@endif
									</td>
								</tr>
							</table>
							
							
						</div>
					</div>
					<table width="100%">
						<tr>
							<td width="10%">
								
							</td>
							<td width="90%">
								
								<?php 
									$subQs = App\Question::where('subId',$question->id)->orderBy('id')->get();
								?>
								@if(count($subQs) != 0)
									@foreach($subQs as $key => $subQ)
									<div class="q-box-2">
										<div style="color: #969696; font-size: 0.9em;">ความเห็นที่ {{$question->id}}-{{$key+1}}</div>
										<br>
										{!!$subQ->detail!!}
										<br>
										<br>
										<div class="q-box-bottom">
											<?php
												$memberCh = App\User::where('id',$subQ->memberId)->first();
												$dateCreate = strtotime($subQ->created_at);
												$date = date('j/n/Y',$dateCreate);
												$time = date('H:i',$dateCreate);
											?>
											<table width="100%">
												<tr>
													<td>
														<table cellpadding="5" cellspacing="5"> 
															<tr>
																<td style="padding: 5px" valign="top">
																	<img class="img-post" src="/{{$memberCh->picture}}" width="30">
																</td>
																<td style="padding: 5px"  valign="top">
																		สมาชิกหมายเลข {{$memberCh->id}} | {{$memberCh->username}}
																	<br>
																	เมื่อ {{$date}} เวลา {{$time}} น.
																</td>
															</tr>
														</table>
													</td>
													<td align="right">
														@if(Auth::check())
															@if(Auth::user()->admin || Auth::user()->id == $subQ->memberId)
																<a style="color: #fff;" href="{{route('questionDel')}}?id={{$subQ->id}}" 
																onclick="if(!confirm('คุณต้องการลบโพสต์นี้หรือไม่?')){return false;}">
																<span class="glyphicon glyphicon-trash"></span>
																</a>
															@endif
														@endif
													</td>
												</tr>
											</table>
														
										</div>
									</div>
									@endforeach
								@endif
								@if(Auth::check())
								
								<div class="q-box-2 post-box post-box-{{$question->id}}" style="display: none;">

									{!! Form::open(['url'=>route('questionHome'),'id'=>'formpost-'.$question->id]) !!}
										{!! Form::hidden('subId',$question->id) !!}
										{!! Form::hidden('title',$question->title) !!}

									      {!! Form::textarea('detail','',['rows'=>'3','class'=>'input-repost','placeholder'=>'เนื้อหา']) !!}
									    	<button class="btn btn-success" style="margin-top: 10px;border: 1px solid #fff;" type="submit">โพสต์</button> 
									    	&nbsp;&nbsp;&nbsp;&nbsp;
									    	<a class="textPost" style="cursor: pointer;" 
											onclick="$('.post-box-{{$question->id}}').toggle()">
											<span class="glyphicon glyphicon-remove"></span> ปิดกล่อง
											</a>
										
										
									{!! Form::close() !!}

								</div>
								@endif
							</td>
						</tr>
					</table>
					
				@endif
			@endforeach
		@endif
		
		<div class="post-box">
			<style type="text/css">
				.input-post-title{
					color: #ffff00;
					font-size: 1.5em;
					background: #222244;
					width: 100%;
					padding: 10px;
					border: 0;
				}
				.input-post-detail{
					color: #fff;
					background: #222244;
					width: 100%;
					padding: 10px;
					border: 0;
				}
			</style>
			<div class="q-box-1">
			@if(Auth::check())
				{!! Form::open(['url'=>route('questionHome')]) !!}
					{!! Form::hidden('subId','0') !!}
					{!! Form::text('title','',['class'=>'input-post-title','placeholder'=>'หัวข้อ']) !!}
					{!! Form::textarea('detail','',['rows'=>'3','class'=>'input-post-detail','placeholder'=>'เนื้อหา']) !!}
					<button class="btn btn-success" style="margin-top: 10px;border: 1px solid #fff;" type="submit">โพสต์</button>
				{!! Form::close() !!}
			</div>
			@else
				ลงชื่อเข้าใช้เพื่อโพสข้อความ
			@endif
		</div>
		
		
		


@endsection