@extends('layouts.app')
@section('title', '管理员添加')
@section('content')
									<form class="form-horizontal" action="{{url('admin/store')}}" method="post" role="form" >
										@csrf
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 管理员名称 </label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1" id="adminname" placeholder="管理员名称" name="a_name" class="col-xs-10 col-sm-5" />
											<b style="color:red">{{$errors->first('a_name')}}</b>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 管理员密码</label>

										<div class="col-sm-9">
											<input type="password" id="form-field-1"  name="a_pwd" placeholder="管理员密码 " class="col-xs-10 col-sm-5" id="pwd" />
											<b style="color:red">{{$errors->first('a_pwd')}}</b>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 管理员等级 </label>

										<select name="a_level">
											<option value="">请选择</option>
											<option value="1">系统管理员</option>
											<option value="2">主管</option>
											<option value="3">业务员</option>
										</select>
									</div>

									<div class="space-4"></div>
								
									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											<button type="submit" class="btn btn-default">提交</button>

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
						