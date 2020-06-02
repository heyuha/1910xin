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
													<tr>
														<td>{{$v->a_id}}</td>
														<td>{{$v->a_name}}</td>
														<td>@if($v->a_level==1)系统管理员 @endif
															@if($v->a_level==2)主管 @endif
															@if($v->a_level==3)业务员 @endif
														</td>
														<td>
														<button class="btn">编辑</button>
														<button class="btn btn-danger">删除</button>
														</td>

													</tr>
													@endforeach							

													
												</tbody>
											</table>
										</div><!-- /.table-responsive -->
									

				


@endsection