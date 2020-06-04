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
												        <td colspan="4" align="center">{{$admin->appends(['a_name'=>$a_name])->links()}}</td>
												     </tr> 