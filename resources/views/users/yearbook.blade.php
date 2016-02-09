@extends('master')pri

@section('title')
	หนังสือรุ่น
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
		width:80px;
		text-align: left;;
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
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1">ชื่อเล่น</span>
				 	<input type="text" class="form-control" name="nickname" placeholder="เช่น อิชิตัน,โออิชิ" aria-describedby="basic-addon1">
				</div>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon2">แนะนำตัว</span>
					<input type="text" class="form-control" name="aboutMe" placeholder="เช่น สวัสดีฉันชื่ออิชิตัน" aria-describedby="basic-addon2">					
				</div>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon3">คติประจำใจ</span>
					<input type="text" class="form-control" name="motto" placeholder="เช่น จงทำวันนี้ให้ดีที่สุด" aria-describedby="basic-addon3">					
				</div>	
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon4">สามคำที่เป็นตัวเอง</span>
					<input type="text" class="form-control" name="define" placeholder="หล่อ,สวย" aria-describedby="basic-addon4">	
					<input type="text" class="form-control" name="define" placeholder="ขาว,ดำ" aria-describedby="basic-addon4">	
					<input type="text" class="form-control" name="define" placeholder="ตี๋,หมวย" aria-describedby="basic-addon4">						
				</div>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon5">วิชาที่ชอบ</span>
				 	<input type="text" class="form-control" name="likeSubject" placeholder="เช่น คณิต,วิทย์,อังกฤษ,สังคม" aria-describedby="basic-addon5">
				</div>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon6">สีที่ชอบ</span>
				 	<input type="text" class="form-control" name="likeColor" placeholder="เช่น ขาด,ดำ" aria-describedby="basic-addon6">
				</div>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon7">เพื่อสนิท</span>
				 	<input type="text" class="form-control" name="myfriend" placeholder="เช่น อิชิตัน,โออิชิ" aria-describedby="basic-addon7">
				</div>
		 		<div class="input-group">
					<span class="input-group-addon" id="basic-addon8">อาจารย์ที่ชื่นชอบ</span>
				 	<input type="text" class="form-control" name="myTeacher" placeholder="เช่น อ.อิชิตัน,อ.โออิชิ" aria-describedby="basic-addon8">
		 		</div>
		 		<div class="input-group">
					<span class="input-group-addon" id="basic-addon9">อยากบอกเพื่อนว่า</span>
				 	<input type="text" class="form-control" name="myFriend" placeholder="เช่น ลาก่อนอิชิตัน,ลาก่อนโออิชิ" aria-describedby="basic-addon9">
		 		</div>
		 		<div class="input-group">
					<span class="input-group-addon" id="basic-addon10">อยากบอกอาจารย์ว่า</span>
				 	<input type="text" class="form-control" name="tellTeacher" placeholder="เช่น ลาก่อนครับ,ลาก่อนค่ะ" aria-describedby="basic-addon10">
		 		</div>
		 		<div class="input-group">
					<span class="input-group-addon" id="basic-addon11">อยากบอกโรงเรียนว่า</span>
				 	<input type="text" class="form-control" name="tellSchool" placeholder="เช่น เรียนดีจุงเบย" aria-describedby="basic-addon11">
		 		</div>
		 	</div>	 			
	 	</div>
	</div>
	<div class="col-sm-6">
		<div class="panel panel-primary">
	 		<div class="panel-heading">
	 			ภาพ
	 		</div>	 			
	 	</div>
	</div>	
</div>

@endsection