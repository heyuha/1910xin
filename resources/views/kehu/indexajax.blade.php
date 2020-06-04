@foreach($kehu as $k=>$v)
		<tr k_id={{$v->k_id}}>
			<td>{{$v->k_id}}</td>
			<td>{{$v->k_name}}</td>
			<td>{{$v->k_level}}</td>
			<td>{{$v->k_hang}}</td>
			<td>{{$v->k_lai}}</td>
			<td>{{$v->y_name}}</td>
			<td>{{$v->k_tels}}</td>
			<td>{{$v->k_tel}}</td>
			
			
			<td>
				<button type="submit"  class="btn btn-default"><a href="{{url('/kehu/edit/'.$v->k_id)}}">编辑</a></button>
				<button type="submit"  class="btn btn-default delete">删除</button>
			</td>
											
	</tr>
@endforeach							

			<tr>
				<td colspan="9" align="center">{{$kehu->appends(['k_name'=>$k_name])->links()}}</td>
			</tr> 