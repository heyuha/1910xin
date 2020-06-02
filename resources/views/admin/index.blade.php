@extends('layouts.app')
@section('title', '管理员')
@section('content')



									
									
										<div class="table-responsive">
											<table id="sample-table-1" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th>ID</th>
														<th>管理员名</th>
														<th>等级</th>
														
														<th>操作</th>
													</tr>
												</thead>

												<tbody>
													@foreach($admin as $k=>$v)
													<tr a_id={{$v->a_id}}>
														<td>{{$v->a_id}}</td>
														<td>{{$v->a_name}}</td>
														<td>@if($v->a_level==1)系统管理员 @endif
															@if($v->a_level==2)主管 @endif
															@if($v->a_level==3)业务员 @endif
														</td>
														<td>
														<button type="submit"  class="btn btn-default"><a href="{{url('/admin/edit/'.$v->a_id)}}">编辑</a></button>
														<button type="submit"  class="btn btn-default delete">删除</button>
														</td>
											
													</tr>
													@endforeach							

													<tr>
												        <td colspan="4" align="center">{{$admin->links()}}</td>
												     </tr> 
												</tbody>
											</table>
										</div><!-- /.table-responsive -->
									

				
<script>
	$(".delete").click(function(){
		var _this = $(this);
		// alert(_this)
		var a_id = _this.parents('tr').attr('a_id')
		// alert(a_id)
		if(window.confirm('您确定要删除吗？')){
			$.get('/admin/delete',{a_id:a_id},function(res){
			location.href="/admin";
		},'json');
		}
	})

	$(document).on('click','.page-item a',function(){
		// alert(123)
		var _this = $(this)
		var url = _this.attr('href')
		// alert(url)
		$.get(url,function(res){
			$('tbody').html(res);
		})
		return false;
	})
</script>

@endsection
