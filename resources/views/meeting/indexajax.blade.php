@foreach($meeting as $k=>$v)
		<tr m_id={{$v->m_id}}>
			<td>{{$v->m_id}}</td>
			<td>{{$v->y_name}}</td>
			<td>{{$v->k_name}}</td>
			<td>{{date('Y-m-s H:i:s',$v->m_time)}}</td>
			<td>{{$v->m_man}}</td>
			<td>{{$v->m_url}}</td>
			<td>{{$v->m_desc}}</td>
			<td>{{date('Y-m-s H:i:s',$v->m_ntime)}}</td>
			
			<td>
				<button type="submit"  class="btn btn-default"><a href="{{url('/meeting/edit/'.$v->m_id)}}">编辑</a></button>
				<button type="submit"  class="btn btn-default delete">删除</button>
			</td>
											
	</tr>
@endforeach							

			<tr>
				<td colspan="9" align="center">{{$meeting->links()}}</td>
			</tr> 