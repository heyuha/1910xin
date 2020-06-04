@extends('layouts.app')
@section('title', '业务员')
@section('content')



									
									
<div class="table-responsive">
	<form action="">
		业务员名称<input type="text" value="{{$y_name}}" name="y_name">
		<input type="submit" value="搜索">
	</form>
	<table id="sample-table-1" class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>ID</th>
				<th>业务员名称</th>
				<th>业务员性别</th>
				<th>办公电话</th>
				<th>手机号</th>
				
				<th>操作</th>
			</tr>
		</thead>

<tbody>
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
		</tbody>
	</table>
</div><!-- /.table-responsive -->
									
<script>
	$(".delete").click(function(){
		// alert(123)
		var m_id = $(this).parents('tr').attr('y_id');
		// alert(m_id)
		if(window.confirm('确定删除吗？')){
			$.get('/yewu/delete',{m_id:m_id},function(res){
				if(res.code==00000){
					location.href="/yewu"
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
