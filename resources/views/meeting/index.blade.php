@extends('layouts.app')
@section('title', '管理员')
@section('content')



									
									
<div class="table-responsive">
<form action="">
	
	客户名称    <select name="k_name" id="">
					<option value="">请选择</option>
					@foreach($kehu as $k=>$v)
					<option value="{{$v->k_id}}" @if($v->k_id==$k_name)selected @endif>{{$v->k_name}}</option>
					@endforeach
				</select>
	访问人      <input type="text" name="m_man" value="{{$m_man}}">
	<input type="submit" value="搜索">
</form>
	<table id="sample-table-1" class="table table-striped table-bordered table-hover">
	
		<thead>
			<tr>
				<th>ID</th>
				<th>业务员名称</th>
				<th>客户名称</th>
				<th>访问时间</th>
				<th>访问人</th>
				<th>访问地址</th>
				<th>访问详情</th>
				<th>下次访问时间</th>
				<th>操作</th>
			</tr>
		</thead>

<tbody>
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
				<td colspan="9" align="center">{{$meeting->appends(['m_man'=>$m_man,'k_name'=>$k_name])->links()}}</td>
			</tr> 
		</tbody>
	</table>
</div><!-- /.table-responsive -->
									
<script>
	$(".delete").click(function(){
		// alert(123)
		var m_id = $(this).parents('tr').attr('m_id');
		// alert(m_id)
		if(window.confirm('确定删除吗？')){
			$.get('/meeting/delete',{m_id:m_id},function(res){
				if(res.code==00000){
					location.href="/meeting"
				}
		},'json')
		}
	})
	$(document).on('click','.page-item a',function(){
		// alert(123)
		var url = $(this).attr('href');
		// alert(url)
		$.get(url,function(res){
			$('tbody').html(res)
		})
		return false;
	})
</script>


@endsection
