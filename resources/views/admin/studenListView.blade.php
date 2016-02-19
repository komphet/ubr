

				<table class="table table-hover" style="min-width:500px; ">
					<tr>
						<td colspan="5" class="warning" align="center">
							พบผลการค้นหาที่ตรงตามเงื่อนไข จำนวน <strong>{{$studenLists->total()}}</strong> รายการ
						</td>
					</tr>
					<tr>
						<th>{!! Form::checkbox("delAll",'',false,array('onclick'=>'seleteDel()')) !!} <a onclick="delStuden()">[ลบ]</a></th>
						<th>รหัสนักเรียน</th>
						<th>รหัสประชาชน</th>
						<th>ชื่อ-นามสกุล</th>
						<th>ชั้น</th>
						<th>เลขที่</th>
					</tr>
					
						@foreach($studenLists as $studenList)
						<tr id="list-{{ $studenList->id }}" 
							data-gradYear="{{ $studenList->gradYear }}"
							data-class="{{ $studenList->class }}"
							data-room="{{ $studenList->room }}"
							data-CRNo="{{ $studenList->CRNo }}"
							data-studenNo="{{ $studenList->studenNo }}"
							data-idCardNo="{{ $studenList->idCardNo }}"
							data-titleName="{{ $studenList->titleName }}"
							data-name="{{ $studenList->name }}"
							data-lastname="{{ $studenList->lastname }}"
							data-admin="{{ $studenList->admin }}"
							onclick="updateStuden('{{ $studenList->id }}');"
							class="studenList 
								@if($studenList->admin)
									info
								@endif
							"
							>
							<td>{!! Form::checkbox("del",$studenList->id,false,array('onclick'=>'event.stopPropagation()')) !!}</td>
							<td>{{ $studenList->studenNo }}</td>
							<td>{{ $studenList->idCardNo }}</td>
							<td>
								<table width="100%">
									<tr>										
										<td width="20%">{{ $studenList->titleName }}</td>
										<td width="40%">{{ $studenList->name }}</td>
										<td width="40%">{{ $studenList->lastname }}</td>
									</tr>
								</table>
							</td>
							<td>{{ $studenList->class }}/{{ $studenList->room }}</td>
							<td>{{ $studenList->CRNo }}</td>
						</tr>
						@endforeach
						<tfoot>
							<td colspan="5" align="center"> 
								<ul class="pagination">
								@if($totalPage > 1)
									@if($page > 1)
										<li><a onclick="pagination('{{$page-1}}','{{$column}}','{{$key}}')"> &laquo; </a></li>
									@endif
									@for($i=1;$i<=$totalPage;$i++)
					
											<li <?php if($i == $page) echo 'class="active"'; ?>>
											<a 
												@if($i != $page)
												onclick="pagination('{{$i}}','{{$column}}','{{$key}}')"
												@endif
											> {{$i}} </a>
											</li>
									@endfor

									@if($page != $totalPage)
										<li><a onclick="pagination('{{$page+1}}','{{$column}}','{{$key}}')"> &raquo; </a></li>
									@endif
								@endif
								</ul>
							</td>
						</tfoot>
				</table>
			