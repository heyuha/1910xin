@extends('layouts.app')
@section('title', '管理员修改')
@section('content')
									<form class="form-horizontal" action="{{url('admin/update/'.$admin->a_id)}}" method="post" role="form" >
										@csrf
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 管理员名称 </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1" value="{{$admin->a_name}}" id="adminname" placeholder="管理员名称" name="a_name" class="col-xs-10 col-sm-5" />
											<!-- <b style="color:red">{{$errors->first('a_name')}}</b> -->
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 管理员密码</label>

										<div class="col-sm-9">
											<input type="password" id="form-field-1" value="{{$pwd}}"  name="a_pwd" placeholder="管理员密码 " class="col-xs-10 col-sm-5" id="pwd" />
											<!-- <b style="color:red">{{$errors->first('a_pwd')}}</b> -->
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 管理员等级 </label>

										<select name="a_level">
											<option value="1" @if($admin->a_level==1)selected @endif>系统管理员</option>
											<option value="2" @if($admin->a_level==2)selected @endif>主管</option>
											<option value="3" @if($admin->a_level==3)selected @endif>业务员</option>
										</select>
									</div>

									<div class="space-4"></div>
								
									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											<button type="submit" class="btn btn-default">编辑</button>

											&nbsp; &nbsp; &nbsp;
											<button class="btn" type="reset">
												<i class="icon-undo bigger-110"></i>
												重置
											</button>
										</div>
									</div>

									<div class="hr hr-24"></div>



								</form>


<script>
	$("#adminname").blur(function(){
		alert(123)
	})
</script>	

@endsection			
						