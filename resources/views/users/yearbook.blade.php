@extends('master')

@section('title')
	หนังสือรุ่น
@endsection

@section('yearbook')
	active
@endsection

@section('breadcrumb')
 <li><a href="{{ route('yearbook') }}">หนังสือรุ่น</a></li>
@endsection 

@section('content')



<style type="text/css">
	.input-group{
		margin-bottom:5px; 
	}
	.input-title{
		width:70px;
		text-align: left;
	}
	.input-title2{
		width:110px;
		text-align: left;
	}
	.studenList{
		cursor: pointer;
	}


</style>
<div class="row">
	<div class="col-sm-6">
		<div class="panel panel-primary">
	 		<div class="panel-heading">
	 				หนังสือรุ่น
	 		</div>
	 		<div class="panel-body">
	 		{!! Form::open(['url'=>route('yeaBooGen'),'id'=>'ebookForm']) !!}
	 			{!! Form::hidden('action','save') !!}
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon2"><div class="input-title">แนะนำตัว1</div></span>
					<input type="text" value="<?php if(isset($checkYB->aboutMe1)) echo $checkYB->aboutMe1; ?>" class="form-control ajaxPicture" name="aboutMe1" placeholder="เช่น สวัสดีฉันชื่ออิชิตัน" aria-describedby="basic-addon2">				
				</div>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon2"><div class="input-title">แนะนำตัว2</div></span>
					<input type="text" value="<?php if(isset($checkYB->aboutMe2)) echo $checkYB->aboutMe2; ?>" class="form-control ajaxPicture" name="aboutMe2" placeholder="เช่น สวัสดีฉันชื่ออิชิตัน" aria-describedby="basic-addon2">				
				</div>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon6"><div class="input-title">สีที่ชอบ</div></span>
				 	<input type="text" value="<?php if(isset($checkYB->likeColor)) echo $checkYB->likeColor; ?>" class="form-control ajaxPicture" name="likeColor" placeholder="เช่น ขาด,ดำ" aria-describedby="basic-addon6">
				</div>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon5"><div class="input-title">วิชาที่ชอบ</div></span>
				 	<input type="text" value="<?php if(isset($checkYB->likeSubject)) echo $checkYB->likeSubject; ?>" class="form-control ajaxPicture" name="likeSubject" placeholder="เช่น คณิต,วิทย์,อังกฤษ,สังคม" aria-describedby="basic-addon5">
				</div>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon7"><div class="input-title">เพื่อสนิท</div></span>
				 	<input type="text" value="<?php if(isset($checkYB->myFriend)) echo $checkYB->myFriend; ?>" class="form-control ajaxPicture" name="myfriend" placeholder="เช่น อิชิตัน,โออิชิ" aria-describedby="basic-addon7">
				</div>
		 		<div class="input-group">
					<span class="input-group-addon" id="basic-addon8"><div class="input-title2">อาจารย์ที่ชื่นชอบ</div></span>
				 	<input type="text" value="<?php if(isset($checkYB->myTeacher)) echo $checkYB->myTeacher; ?>" class="form-control ajaxPicture" name="myTeacher" placeholder="เช่น อ.อิชิตัน,อ.โออิชิ" aria-describedby="basic-addon8">
		 		</div>
		 		<div class="input-group">
					<span class="input-group-addon" id="basic-addon9"><div class="input-title2">อยากบอกเพื่อนว่า</div></span>
				 	<input type="text" value="<?php if(isset($checkYB->tellFriend)) echo $checkYB->tellFriend; ?>" class="form-control ajaxPicture" name="tellFriend" placeholder="เช่น ลาก่อนอิชิตัน,ลาก่อนโออิชิ" aria-describedby="basic-addon9">
		 		</div>
		 		<div class="input-group">
					<span class="input-group-addon" id="basic-addon10"><div class="input-title2">อยากบอกอาจารย์ว่า</div></span>
				 	<input type="text" value="<?php if(isset($checkYB->tellTeacher)) echo $checkYB->tellTeacher; ?>" class="form-control ajaxPicture" name="tellTeacher" placeholder="เช่น ลาก่อนครับ,ลาก่อนค่ะ" aria-describedby="basic-addon10">
		 		</div>
		 		<div class="input-group">
					<span class="input-group-addon" id="basic-addon11"><div class="input-title2">อยากบอกโรงเรียนว่า</div></span>
				 	<input type="text" value="<?php if(isset($checkYB->tellSchool)) echo $checkYB->tellSchool; ?>" class="form-control ajaxPicture" name="tellSchool" placeholder="เช่น เรียนดีจุงเบย" aria-describedby="basic-addon11">
		 		</div>
		 		<div class="input-group">
					<span class="input-group-addon" id="basic-addon3"><div class="input-title2">คติประจำใจ</div></span>
					<input type="text" value="<?php if(isset($checkYB->motto)) echo $checkYB->motto; ?>" class="form-control ajaxPicture" name="motto" placeholder="เช่น จงทำวันนี้ให้ดีที่สุด" aria-describedby="basic-addon3">					
				</div>
				@if(count($checkYB) != 0)
					<button type="submit" style="width:100%" class="btn btn-success">อัพเดทหนังสือรุ่น</button>
				@else
					<button type="submit" style="width:100%" class="btn btn-warning">จัดทำหนังสือรุ่น</button>
				@endif
		 		
			{!! Form::close() !!}
		 	</div>	 			
	 	</div>
	</div>
	<div class="col-sm-6">
		@if(isset($checkYB->link))
			<img id="result" class="img-responsive" src="//{{$_SERVER['SERVER_NAME']}}/{{$checkYB->link}}">
		@else
			<img id="result" class="img-responsive" src="{{route('yeaBooGen')}}">
		@endif
	</div>	
</div>


<script type="text/javascript">

function updateBook(){
	var queryStr = '?action=update';
	$('.ajaxPicture').each(function(){
		var name = $(this).attr('name');
		var value = $(this).val();
		queryStr = queryStr+'&'+name+'='+value;
	});
	$('#result').attr('src',"{{route('yeaBooGen')}}"+queryStr);
}

$(document).ready(function(){
	$('.ajaxPicture').each(function(){
		$(this).bind('change',function(){
			updateBook();
		});
	});
});

</script>


@endsection