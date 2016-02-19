

				<table class="table table-hover" style="min-width:500px;">
					<tr>
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
					
				</table>
				<ul class="pagination">
					<li><a href="?page=1&limit={{$limit}}&key={{$key}}"> First </a></li>
					@if($page > 1)
						<li><a href="?page={{$back}}&limit={{$limit}}&key={{$key}}"> &laquo; </a></li>
					@endif
					@for($i=1;$i<=$totalPage;$i++)
	
							<li <?php if($i == $page) echo 'class="active"'; ?>><a href="?page={{$i}}&limit={{$limit}}&key={{$key}}"> {{$i}} </a></li>
					@endfor

					@if($page != $totalPage)
						<li><a href="?page={{$next}}&limit={{$limit}}&key={{$key}}"> &raquo; </a></li>
					@endif
					<li><a href="?page={{$totalPage}}&limit={{$limit}}&key={{$key}}"> Last </a></li>
				</ul>
