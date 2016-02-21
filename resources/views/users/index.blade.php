@extends('master')

@section('title')
	ข้อมูลสมาชิก
@endsection

@section('member')
	active
@endsection

@section('breadcrumb')
	<li><a href="{{ route('member') }}">ข้อมูลสมาชิก</a></li>
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
	.studenList{
		cursor: pointer;
	}


</style>

<div class="row">
	<div class="col-md-2 col-sm-4">
		<ul class="list-group">
		  <li class="list-group-item" align="center">
		  	<img id="pro-picture" class="img-responsive" src="//{{$_SERVER['SERVER_NAME']}}/{{Auth::user()->picture}}">

		  </li>
		  <a href="{{ route('member') }}" class="list-group-item <?php if(!isset($_GET['action'])) echo 'active'; ?>" >สมาชิก</a></li>			  				  
		  <a href="?action=1" class="list-group-item <?php if(isset($_GET['action'])){if($_GET['action'] == 1) echo 'active';} ?>" >เปลี่ยนภาพ</a></li>
		  <a href="?action=2" class="list-group-item <?php if(isset($_GET['action'])){if($_GET['action'] == 2) echo 'active';} ?>" >แก้ไขข้อมูล</a></li>
		  <a href="?action=3" class="list-group-item <?php if(isset($_GET['action'])){if($_GET['action'] == 3) echo 'active';} ?>" >เปลี่ยนรหัสผ่าน</a></li>
		  <a href="?action=4" class="list-group-item <?php if(isset($_GET['action'])){if($_GET['action'] == 4) echo 'active';} ?>" >ข้อความ</a></li>
		</ul>			
	</div>
	<div class="col-md-6 col-sm-4">
		
				@if(isset($_GET['action']))
					
					@if($_GET['action'] == 1)
					<link rel="stylesheet" href="//{{$_SERVER['SERVER_NAME']}}/croppie/croppie.css" />
					<script src="//{{$_SERVER['SERVER_NAME']}}/croppie/croppie.js"></script>
					<div class="panel panel-primary">
						<div id="pictureWidth" class="panel-body">
							{!! Form::open(['url'=>route('uploadPic'),'id'=>'uploadForm','files' => true]) !!}
						 	{!! Form::hidden('picture','',['id'=>'pictureUrl']) !!}
							<div class="input-group">
								<span class="input-group-addon" id="basic">เลือกภาพ</span>
								<input id="imgInp" type="file" name="image" class="form-control" >
								<span class="input-group-btn"><button type="button" class="uploadCrop-result btn btn-success">บันทึกภาพ</button></span>
							</div>
							{!! Form::close() !!}
							<div class="progress" style="display: none;">
							  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
							  </div>
							</div>
							<div id="item">
							</div>

							<script type="text/javascript">
								var picUrl = "//{{$_SERVER['SERVER_NAME']}}/{{Auth::user()->picture}}";
								$('#uploadForm').ajaxForm({
									beforeSubmit:function(){
										$('#item').hide();
										$('.progress').show();
									},
									success:function(data){
										picUrl = null;
										$('#pro-picture').attr('src',picUrl);
										uploadCropFunction();
										picUrl = "//{{$_SERVER['SERVER_NAME']}}/"+data;
										$('#pro-picture').attr('src',picUrl);
										uploadCropFunction();
										
									},
									fail:function(){
										alert('Error! กรุณาตรวจสอบการเชื่อมต่อ!');
									},
									xhr: function() {  // Custom XMLHttpRequest
							            var myXhr = $.ajaxSettings.xhr();
							            if(myXhr.upload){ // Check if upload property exists
							                myXhr.upload.addEventListener('progress',progressHandlingFunction, false); // For handling the progress of the upload
							            }
							            return myXhr;
							        },
								});

								function progressHandlingFunction(e){
								    if(e.lengthComputable){
								    	$now = e.loaded;
								    	$total = e.total;
								    	$per = ($now*100)/$total;
								        $('.progress-bar').attr('aria-valuemax',$total).attr('aria-valuenow',$now).css('width',$per+'%');

								        if($per == 100){
								        	$('#item').show();
											$('.progress').hide();
								        }
								       
								    }
								}
								function uploadCropFunction(){
									$('#item').text('');
									var pictureWidth = $('#pictureWidth').width()-80;
									var PicViewport = (pictureWidth*80)/100;
									var uploadCrop = $('#item').croppie({
									    viewport: {
									        width: PicViewport,
									        height: PicViewport,
									        type: 'square'
									    },
									    boundary: {
									        width: pictureWidth,
									        height: pictureWidth
									    },

									});
									uploadCrop.croppie('bind', {
									    url: picUrl,
									});
									$('.uploadCrop-result').unbind().bind('click',function(){
											uploadCrop.croppie('result', {
								                type: 'canvas',
								                size: 'viewport'
								            }).then(function (src) {
								            	$('#pictureUrl').val(src);
								            	$('#uploadForm').submit();
								            });
									});

								}
								uploadCropFunction();
								$(window).resize(function(){
									uploadCropFunction();
								});

								function readURL(input) {

								    if (input.files && input.files[0]) {
								        var reader = new FileReader();

								        reader.onload = function (e) {
								        	picUrl = e.target.result;
								            uploadCropFunction()
								        }

								        reader.readAsDataURL(input.files[0]);
								    }
								}

								$("#imgInp").change(function(){
								    readURL(this);
								});


								


								

							</script>
						</div>
					</div>

					@elseif($_GET['action'] == 2)
					{!! Form::open() !!}
					{!! Form::hidden('id','') !!}
					<div class="panel panel-primary">
					  <div class="panel-heading">
					  	แก้ไขข้อมูล
					  	<div class="row">
					  	</div>		  	
					  </div>
					  <div class="panel-body">		  	
					  		<div class="input-group">
							  <span class="input-group-addon" id="basic-addon1"><div class="input-title">ปีจบการศึกษา</div></span>
							  <input value="{{ Auth::user()->gradYear }}" type="text" class="form-control" name="gradYear" aria-describedby="basic-addon1">
							</div>
					  		<div class="input-group">
							  <span class="input-group-addon"><div class="input-title">สายชั้น</div></span>
							  <select class="form-control" id="sel1" name="classRoom">
							  	@foreach($classTeachers as $classTeacher)
							    	<option class="classRoomOption" <?php if(Auth::user()->class == $classTeacher->title && Auth::user()->room == $classTeacher->value){ echo 'selected';}; ?> value="{{$classTeacher->title}},{{$classTeacher->value}}">{{$classTeacher->title}}/{{$classTeacher->value}} {{$classTeacher->detail}}</option>
							    @endforeach
							  </select>
							</div>
							<div class="input-group">
							  <span class="input-group-addon" id="basic-addon1"><div class="input-title">เลขที่</div></span>
							  <input type="text" class="form-control" name="CRNo" value="{{ Auth::user()->CRNo }}" aria-describedby="basic-addon1">
							</div>
							<div class="input-group">
							  <span class="input-group-addon" id="basic-addon1"><div class="input-title">รหัสนักเรียน</div></span>
							  <input type="text" class="form-control" name="studenNo" value="{{ Auth::user()->studenNo }}" aria-describedby="basic-addon1">
							</div>
							<div class="input-group">
							  <span class="input-group-addon" id="basic-addon1"><div class="input-title">รหัสประชาชน</div></span>
							  <input type="text" class="form-control" name="idCardNo" value="{{ Auth::user()->idCardNo }}" aria-describedby="basic-addon1">
							</div>
							<div class="input-group">
							  <span class="input-group-addon"><div class="input-title">คำนำหน้าชื่อ</div></span>
							  <select class="form-control" name="titleName" id="sel2">
							  	@foreach($titleNames as $titleName)
							    	<option <?php if(Auth::user()->titleName == $titleName->title){ echo 'selected';}; ?> class="titleNameOption" value="{{$titleName->title}}">{{$titleName->title}}</option>
							    @endforeach
							  </select>
							</div>
							<div class="input-group">
							  <span class="input-group-addon" id="basic-addon1"><div class="input-title">ชื่อ</div></span>
							  <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" aria-describedby="basic-addon1">
							</div>
							<div class="input-group">
							  <span class="input-group-addon" id="basic-addon1"><div class="input-title">นามสกุล</div></span>
							  <input type="text" class="form-control" name="lastname" value="{{ Auth::user()->lastname }}" aria-describedby="basic-addon1">
							</div>				
							<button type="submit" style="width:100%" class="btn btn-success">บันทึกข้อมูล</button>
					  </div>
					</div>
				{!! Form::close(); !!}
					@elseif($_GET['action'] == 3)
					<div class="panel panel-primary">
						<div class="panel-body">

						</div>
					</div>
					@elseif($_GET['action'] == 4)
					<div class="panel panel-primary">
						<div class="panel-body">

						</div>
					</div>
					@endif
					@else
						<div class="panel panel-warning">
							<div class="panel-heading">
								ประกาศ
							</div>
							<div class="panel-body">
								เปิดเซิฟเวอร์ใหม่									
							</div>
						</div>
						<div class="panel panel-danger">
							<div class="panel-heading">
								สิ่งที่ต้องทำ
							</div>
							<div class="panel-body">
								- ลงทะเบียน
								<br>
								- ลงชื่อเข้าใช้								
							</div>
						</div>
					@endif
	</div>	
	<div class="col-md-4 col-sm-4">
		<div class="panel panel-danger">
			<div class="panel-body">
				{{ Auth::user()->titleName }}
				{{ Auth::user()->name }}
				{{ Auth::user()->lastname }}
				ชั้น ม.{{ Auth::user()->class }}/{{ Auth::user()->room }}
				เลขที่ {{ Auth::user()->CRNo }}
				<br>					
				บ้านเลขที่ {{ Auth::user()->address }}
				<br>
				เบอร์โทรศัพท์ {{ Auth::user()->tel }}
				<br>
				ช่องทางการติดต่อ {{ Auth::user()->contact }}
				<br>
				<?php
					$date = strtotime(Auth::user()->birthday);
					$dateThai = date("วันที่ d เดือน n",$date);
					$yearThai = date("Y",$date)+543;
				?>
				วันเกิด {{ $dateThai }} ปี {{ $yearThai }}
				<br>
				ปีจบการศึกษา {{ Auth::user()->gradYear }}
				<br>
			</div>				
		</div>
	</div>	
</div>



@endsection 