@extends('master')

@section('title')
	Setup
@endsection

@section('breadcrumb')
 <li><a href="{{ route('member') }}">{{ Auth::user()->username }}</a></li>
 <li><a href="{{ route('admin') }}">Admin</a></li>
@endsection 

@section('content')
<script src="//{{ $_SERVER['SERVER_NAME'] }}/js/jquery.form.js"></script>




<div class="row">
	<div class="col-sm-2">
		<ul class="list-group">
			@foreach($SetupCate as $key => $SetupCateList)
				<a data-ele='setupContent{{$SetupCateList->id}}' class="pointer list-group-item setupMenu <?php 
					if(isset($_GET['action'])){
						if($_GET['action'] == 'setupContent'.$SetupCateList->id ){
							echo "active"; 
						}
					}else{
						if($key == 0){
							echo "active";
						}
					}
				?>">{{$SetupCateList->title}}</a>
			@endforeach
			<a data-ele='setupMainMenu' class="pointer list-group-item setupMenu <?php 
					if(isset($_GET['action'])){
						if($_GET['action'] == 'setupMainMenu' ){
							echo "active"; 
						}
					}
				?>">แก้ไข/เพิ่มหัวข้อหลัก</a>
		  
		</ul>
	</div>
	<div class="col-sm-10">
		<div class="panel panel-info setupBox" id="setupMainMenu" 
			<?php 
				if(isset($_GET['action'])){
					if($_GET['action'] != 'setupMainMenu' ){
						echo "style='display:none;'"; 
					}
				} else{
					echo "style='display:none;'"; 
				}
			?>
		>
			<div class="panel-heading">
				หัวข้อหลัก(Category)
			</div>
			<div class="panel-body">
					<div id="setupCreate" style="width:100%;overflow:auto;">
						<table class="table" style="min-width:700px; width:100%; ">
							<tr>
								<th width="50px">#</th>
								<th>ประเภท(Category)</th>
								<th>คำอธิบาย(Detail)</th>
								<th>Slug</th>
								<th>Active</th>
								<th></th>


							</tr>
							{!! Form::open(array('url'=>route('adminSetupInsert'),'id'=>'setupCateCreate','class'=>'ajaxForm')) !!}
							{!! Form::hidden('table','cate') !!}
							<tr class="warning">
								<td>
									{!! Form::text('list','0',array('class'=>'form-control input-sm')) !!}
								</td>
								<td>
									{!! Form::text('title','',array('class'=>'form-control input-sm')) !!}
								</td>
								<td>
									{!! Form::text('detail','',array('class'=>'form-control input-sm')) !!}
								</td>
								<td>
									{!! Form::text('slug','',array('class'=>'form-control input-sm')) !!}
								</td>
								<td>
									{!! Form::checkbox('active',1,1) !!}
								</td>
								<td align="right">
									<button type="submit" form="setupCateCreate" class="btn btn-success btn-xs">
										<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>
									</button>
								</td>
							</tr>
							{!! Form::close() !!}
							@foreach($SetupCate as $SetupCateList)
								{!! Form::open(array('url'=>route('adminSetupUpdate'),'id'=>'setupCateUpdate'.$SetupCateList->id,'class'=>'formUpdate')) !!}
								{!! Form::hidden('table','cate') !!}
								{!! Form::hidden('id',$SetupCateList->id) !!}

								{!! Form::hidden('cateId',$SetupCateList->id) !!}
								{!! Form::hidden('kindId','null') !!}
								{!! Form::hidden('valueId','null') !!}
								<tr>
									<td>
										{!! Form::text('list',$SetupCateList->list,array('class'=>'form-control input-sm update','data-id'=>$SetupCateList->id,'data-form'=>'setupCateUpdate')) !!}
									</td>
									<td>
										{!! Form::text('title',$SetupCateList->title,array('class'=>'form-control input-sm update','data-id'=>$SetupCateList->id,'data-form'=>'setupCateUpdate')) !!}
									</td>
									<td>
										{!! Form::text('detail',$SetupCateList->detail,array('class'=>'form-control input-sm update','data-id'=>$SetupCateList->id,'data-form'=>'setupCateUpdate')) !!}
									</td>
									<td>
										{!! Form::text('slug',$SetupCateList->slug,array('class'=>'form-control input-sm update','data-id'=>$SetupCateList->id,'data-form'=>'setupCateUpdate')) !!}
									</td>
									<td>
										{!! Form::checkbox('active',1,$SetupCateList->active,array('class'=>'update','data-id'=>$SetupCateList->id,'data-form'=>'setupCateUpdate')) !!}
									</td>
									<td align="right">
										<button onclick="setupDelConfirm('cate',{{$SetupCateList->id}},'{{$SetupCateList->title}}')" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></button>
									</td>
								</tr>
							{!! Form::close() !!}
							@endforeach
						</table>
						
					</div>
			</div>
			<div class="panel-heading">
				หัวข้อรอง(Kind)
			</div>
			<div class="panel-body">
					<div id="setupCreate" style="width:100%;overflow:auto;">
						<table class="table" style="min-width:700px; width:100%; ">
							<tr>
								<th width="50px">#</th>
								<th>ประเภท(Category)</th>
								<th>ชนิด(Kind)</th>
								<th>คำอธิบาย(Detail)</th>
								<th>Slug</th>
								<th>Active</th>
								<th></th>


							</tr>
							{!! Form::open(array('url'=>route('adminSetupInsert'),'id'=>'setupKindCreate','class'=>'ajaxForm')) !!}
							{!! Form::hidden('table','kind') !!}
							<tr  class="warning">
								<td>
									{!! Form::text('list','0',array('class'=>'form-control input-sm')) !!}
								</td>
								<td>
									{!! Form::select('idCate',$cateArray,'',array('class'=>'form-control input-sm')) !!}
								</td>
								<td>
									{!! Form::text('title','',array('class'=>'form-control input-sm')) !!}
								</td>
								<td>
									{!! Form::text('detail','',array('class'=>'form-control input-sm')) !!}
								</td>
								<td>
									{!! Form::text('slug','',array('class'=>'form-control input-sm')) !!}
								</td>
								<td>
									{!! Form::checkbox('active',1,true) !!}
								</td>
								<td align="right">
									<button type="submit" form="setupKindCreate" class="btn btn-success btn-xs">
										<span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>
									</button>
								</td>
							</tr>
							{!! Form::close() !!}
							@foreach($SetupKind::orderBy('list')->get() as $SetupKindList)
								{!! Form::open(array('url'=>route('adminSetupUpdate'),'id'=>'setupKindUpdate'.$SetupKindList->id,'class'=>'formUpdate')) !!}
								{!! Form::hidden('table','kind') !!}
								{!! Form::hidden('id',$SetupKindList->id) !!}

								{!! Form::hidden('cateId',$SetupKindList->idCate) !!}
								{!! Form::hidden('kindId',$SetupKindList->id) !!}
								{!! Form::hidden('valueId','null') !!}
								<tr>
									<td>
										{!! Form::text('list',$SetupKindList->list,array('class'=>'form-control input-sm update','data-id'=>$SetupKindList->id,'data-form'=>'setupKindUpdate')) !!}
									</td>
									<td>
										{{ $cateArray[$SetupKindList->idCate] }}
									</td>
									<td>
										{!! Form::text('title',$SetupKindList->title,array('class'=>'form-control input-sm update','data-id'=>$SetupKindList->id,'data-form'=>'setupKindUpdate')) !!}
									</td>
									<td>
										{!! Form::text('detail',$SetupKindList->detail,array('class'=>'form-control input-sm update','data-id'=>$SetupKindList->id,'data-form'=>'setupKindUpdate')) !!}
									</td>
									<td>
										{!! Form::text('slug',$SetupKindList->slug,array('class'=>'form-control input-sm update','data-id'=>$SetupKindList->id,'data-form'=>'setupKindUpdate')) !!}
									</td>
									<td>
										{!! Form::checkbox('active',1,$SetupKindList->active,array('class'=>'update','data-id'=>$SetupKindList->id,'data-form'=>'setupKindUpdate')) !!}
									</td>
									<td align="right">
										<button onclick="setupDelConfirm('kind',{{$SetupKindList->id}},'{{$SetupKindList->title}}')" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></button>
									</td>
								</tr>
							{!! Form::close() !!}
							@endforeach
						</table>
						
					</div>
			</div>
		</div>
		@foreach($SetupCate as $key => $SetupCateList)
		<?php $SetupKinds = $SetupKind::where('idCate',$SetupCateList->id)->orderBy('list')->get();?>
		<div class="panel panel-info setupBox" id="setupContent{{$SetupCateList->id}}" 
			<?php 
				if(isset($_GET['action'])) {
					if($_GET['action'] != 'setupContent'.$SetupCateList->id){
						echo "style='display:none;'";
					}
				}else{
					if($key != 0){
						echo "style='display:none;'";
					}
				}
			?> 
		>
			@foreach($SetupKinds as $SetupKindList)
				<div class="panel-heading">
					<div class="row" id="kindListTitleText{{$SetupKindList->id}}">
						<div class="col-sm-10">
							
								<strong>#{{$SetupKindList->list}}</strong> {{$SetupKindList->title}}
								@if($SetupKindList->detail)
									({{$SetupKindList->detail}})
								@endif

								@if($SetupKindList->slug)
									[{{$SetupKindList->slug}}]
								@endif
									
							
						</div>
						<div class="col-sm-2" align="right">
							<button onclick="$('#valueInsertTr{{$SetupKindList->id}}').toggle()" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
							<button class="btn btn-warning btn-xs" onclick="$('#kindListTitleText{{$SetupKindList->id}}').hide();$('#kindListTitleUpdate{{$SetupKindList->id}}').show()"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
							<button onclick="setupDelConfirm('kind',{{$SetupKindList->id}},'{{$SetupKindList->title}}')" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></button>
							
						</div>
					</div>
					<div id="kindListTitleUpdate{{$SetupKindList->id}}" style="width:100%;overflow:auto;display:none;">
						{!! Form::open(array('url'=>route('adminSetupUpdate'),'id'=>'kindUpdate'.$SetupKindList->id,'class'=>'ajaxForm')) !!}
							{!! Form::hidden('table','kind') !!}
							{!! Form::hidden('id',$SetupKindList->id) !!}

							{!! Form::hidden('cateId',$SetupCateList->id) !!}
							{!! Form::hidden('kindId',$SetupKindList->id) !!}
							{!! Form::hidden('valueId','null') !!}

						<table class="table" style="min-width:700px; width:100%; ">
							<tr>
								<th width="50px">#</th>
								<th>หัวข้อ(Title)</th>
								<th>คำอธิบาย(Detail)</th>
								<th>Slug</th>
								<th>Active</th>
								<th></th>
							</tr>
							<tr>
								<td>
									{!! Form::text('list',$SetupKindList->list,array('class'=>'form-control input-sm','placeholder'=>'#')) !!}		
								</td>
								<td>
									{!! Form::text('title',$SetupKindList->title,array('class'=>'form-control input-sm','placeholder'=>'หัวข้อ')) !!}
								</td>
								<td>
									{!! Form::text('detail',$SetupKindList->detail,array('class'=>'form-control input-sm','placeholder'=>'เนื้อหา')) !!}
								</td>
								<td>
									{!! Form::text('slug',$SetupKindList->slug,array('class'=>'form-control input-sm','placeholder'=>'slug')) !!}
								</td>
								<td>
									{!! Form::checkbox('active',1,$SetupKindList->active) !!}
								</td>
								
								<td align="right">
									<button type="submit" form="kindUpdate{{$SetupKindList->id}}" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span></button>
									{!! Form::close() !!}
									<button type="button" class="btn btn-warning btn-xs" onclick="$('#kindListTitleUpdate{{$SetupKindList->id}}').hide();$('#kindListTitleText{{$SetupKindList->id}}').show()"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span></button>

								</td>
							</tr>
						</table>
						
					</div>
					
				</div>
				<?php $SetupValues = $SetupValue::where('idKind',$SetupKindList->id)->orderBy('list')->get();?>
				
					
				<div style="width:100%;overflow:auto;">
				<table class="table" style="min-width:700px;"> 
					<tr>
						<th>#</th>
						<th>หัวข้อ(Title)</th>
						<th>เนื้อหา(Value)</th>
						<th>คำอธิบาย(Detail)</th>
						<th>Slug</th>
						<th>Active</th>
						<td align="right"></td>
					</tr>
					{!! Form::open(array('url'=>route('adminSetupInsert'),'id'=>'valueInsert'.$SetupKindList->id,'class'=>'ajaxForm')) !!}
					{!! Form::hidden('idCate',$SetupKindList->idCate) !!}
					{!! Form::hidden('idKind',$SetupKindList->id) !!}
					{!! Form::hidden('table','value') !!}

					{!! Form::hidden('cateId',$SetupCateList->id) !!}
					{!! Form::hidden('kindId',$SetupKindList->id) !!}
					{!! Form::hidden('valueId','null') !!}

					<tr id="valueInsertTr{{$SetupKindList->id}}" style="display:none" class="warning">
							<td 
							width="50px">
								{!! Form::text('list','0',array('class'=>'form-control input-sm')) !!}
							</td>
							<td>
								{!! Form::text('title','',array('class'=>'form-control input-sm')) !!}
							</td>
							<td>
									{!! Form::hidden('valueInsActive','valueIns1',array('id'=>'valueInsActive'.$SetupKindList->id)) !!}
									{!! Form::text('valueIns1','',array('id'=>'valueIns1-'.$SetupKindList->id,'data-id'=>$SetupKindList->id,'class'=>'form-control input-sm valInsIn')) !!}
									{!! Form::textarea('valueIns2','',array('id'=>'valueIns2-'.$SetupKindList->id,'data-id'=>$SetupKindList->id,'style'=>'display:none','class'=>'form-control input-sm valInsIn')) !!}

							</td>
							<td>
								{!! Form::text('detail','',array('class'=>'form-control input-sm')) !!}
							</td>
							<td>
								{!! Form::text('slug','',array('class'=>'form-control input-sm')) !!}
							</td>
							<td>
								{!! Form::checkbox('active',1,true) !!}
							</td>
						<td align="right"><button type="submit" form="valueInsert{{$SetupKindList->id}}" class="btn btn-success btn-xs"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span></button></th>
					</tr>
					{!! Form::close() !!}
					@foreach($SetupValues as $SetupValueList)
						{!! Form::open(array('url'=>route('adminSetupUpdate'),'class'=>'formUpdate','id'=>'valueUpdate'.$SetupValueList->id)) !!}
						{!! Form::hidden('id',$SetupValueList->id) !!}
						{!! Form::hidden('table','value') !!}

						{!! Form::hidden('cateId',$SetupCateList->id) !!}
						{!! Form::hidden('kindId',$SetupKindList->id) !!}
						{!! Form::hidden('valueId',$SetupValueList->id) !!}
						<tr id="setupTr{{$SetupValueList->id}}">
							<td width="50px">
								{!! Form::text('list',$SetupValueList->list,array('class'=>'form-control input-sm update','data-id'=>$SetupValueList->id,'data-form'=>'valueUpdate')) !!}
							</td>
							<td>
								{!! Form::text('title',$SetupValueList->title,array('class'=>'form-control input-sm update titleValue','data-id'=>$SetupValueList->id,'data-form'=>'valueUpdate')) !!}
							</td>
							<td>
								@if($SetupValueList->input == 'text')
									{!! Form::text('value',$SetupValueList->value,array('class'=>'form-control input-sm update','data-id'=>$SetupValueList->id,'data-form'=>'valueUpdate')) !!}

								@elseif($SetupValueList->input == 'textarea')
									{!! Form::textarea('value',$SetupValueList->value,array('class'=>'form-control input-sm update','data-id'=>$SetupValueList->id,'data-form'=>'valueUpdate')) !!}
								@endif
							</td>
							<td>
								{!! Form::text('detail',$SetupValueList->detail,array('class'=>'form-control input-sm update','data-id'=>$SetupValueList->id,'data-form'=>'valueUpdate')) !!}
							</td>
							<td>
								{!! Form::text('slug',$SetupValueList->slug,array('class'=>'form-control input-sm update','data-id'=>$SetupValueList->id,'data-form'=>'valueUpdate')) !!}
							</td>
							<td>
								{!! Form::checkbox('active',1,$SetupValueList->active,array('class'=>'update','data-id'=>$SetupValueList->id,'data-form'=>'valueUpdate')) !!}
							</td>
							{!! Form::close() !!}
							<td align="right"><button onclick="setupDelConfirm('value',{{$SetupValueList->id}},'{{$SetupValueList->title}}')" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></button></td>
							
						</tr>
						
					@endforeach
					
						
					
				</table>
				</div>
				
			@endforeach
			

		
		</div>
		@endforeach
	</div>
</div>


<!-- Modal -->
<div id="modalBox" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body" id="modalContent">
      </div>
      <div class="modal-footer">
      	<span id="modalButton">
      		
      	</span>
        <button id="dismiss" type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
      </div>
    </div>

  </div>
</div>
<script type="text/javascript">

function setupDel(type,id){
	$.post( "<?php echo route('adminSetupDel') ?>", { 
		'_token': $('meta[name=csrf-token]').attr('content'),
		'table'	: type,
		'id'	: id,

	}, function(data) {
		if(data){
			$('#modalBox').modal('hide');
			location.reload();
		}else{
			alert('กรุณาระบุข้อมูลให้ครบถ้วน!');
		}
		
	}).fail(function(data){
		alert('Error: '+'ไม่สามารถทำรายการได้ในขณะนี้!');
	});;
}

function setupDelConfirm(type,id,content){	
	var typeUpper = type.substr(0, 1).toUpperCase() + type.substr(1);
	var buttonDel = '<button type="button" onclick="setupDel(\''+type+'\','+id+');$(this).text(\'Loading...\').addClass(\'disabled\')" class="btn btn-default">ตกลง</button>';
	
	$('#modalContent').html('-'+content);
	$('#modalButton').html(buttonDel);
	$('.modal-title').text('คุณต้องการจะลบการตั้งค่านี้หรือไม่?');
	$('#modalBox').modal('show');
}

	$(document).ready(function() { 
       $('.formUpdate').ajaxForm(function(data){
        	if(data == 'true'){
        	}else if(data == 'false'){
        		alert('กรุณาตรวจสอบข้อมูล!');
        	}else{
        		alert('Error!');
        	}
        });
        $('.ajaxForm').ajaxForm(function(data){
        	if(data == 'true'){
        		location.reload();
        	}else if(data == 'false'){
        		alert('กรุณาตรวจสอบข้อมูล!');
        	}else{
        		alert('Error!');
        	}
        });
        $('.update').each(function(){
        	$(this).bind('change',function(){
        		var id = $(this).attr('data-id');
        		var form = $(this).attr('data-form');
        		$('#'+form+id).submit();
        	});
        });

        $('.valInsIn').each(function(){
        	$(this).bind('dblclick',function(){
        		$(this).hide();
        		var id = $(this).attr('data-id');
        		var active = $('#valueInsActive'+id).val();
        		if(active == 'valueIns1'){
        			$('#valueIns2-'+id).show();
        			$('#valueInsActive'+id).val('valueIns2');
        		}else{
        			$('#valueIns1-'+id).show();
        			$('#valueInsActive'+id).val('valueIns1');
        		}
        	});
        });

        $('.setupMenu').each(function(){
        	$(this).bind('click',function(){
        		$('.setupMenu').removeClass('active');
        		$(this).addClass('active');
        		$('.setupBox').hide();
        		var ele = $(this).attr('data-ele');
        		$('#'+ele).show();
        		history.pushState(null,null, '?action='+ele)
        	});
        	
        });
    }); 

</script>

@endsection