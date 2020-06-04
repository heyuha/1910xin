@foreach($yewu as $k=>$v)
		<tr y_id={{$v->y_id}}>
			<td>{{$v->y_id}}</td>
			<td>{{$v->y_name}}</td>
			<td>@if($v->y_sex==1)男 @endif
				@if($v->y_sex==2)女 @endif
			</td>
			<td>{{$v->y_tels}}</td>
			<td>{{$v->y_tel}}</td>

			<td>
				<button type="submit"  class="btn btn-default"><a href="{{url('/yewu/edit/'.$v->y_id)}}">编辑</a></button>
				<button type="submit"  class="btn btn-default delete">删除</button>
			</td>
											
	</tr>
@endforeach							

			<tr>
				<td colspan="9" align="center">{{$yewu->appends(['y_name'=>$y_name])->links()}}</td>
			</tr> 