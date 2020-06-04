@extends('layouts.app')
@section('title', '管理员')
@section('content')



									
									
<div class="table-responsive">
	<form action="">
		客户名称<input type="text" value="{{$k_name}}" name="k_name">
	
		<input type="submit" value="搜索">
	</form>
	<table id="sample-table-1" class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>ID</th>
				<th>客户名称</th>
				<th>客户级别</th>
				<th>客户从事行业</th>
				<th>客户来源</th>
				<th>业务员</th>
				<th>电话</th>
				<th>手机</th>
				<th>操作</th>
			</tr>
		</thead>

<tbody>
	@foreach($kehu as $k=>$v)
		<tr k_id={{$v->k_id}}>
			<td>{{$v->k_id}}</td>
			<td>{{$v->k_name}}</td>
			<td>
				@if($v->k_level==1)一级客户 @endif
				@if($v->k_level==2)二级客户 @endif
			</td>
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
		</tbody>
	</table>
</div><!-- /.table-responsive -->
									
<script>
	$(".delete").click(function(){
		// alert(123)
		var m_id = $(this).parents('tr').attr('k_id');
		// alert(m_id)
		if(window.confirm('确定删除吗？')){
			$.get('/kehu/delete',{m_id:m_id},function(res){
				if(res.code==00000){
					location.href="/kehu"
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
