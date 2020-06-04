@extends('layouts.app')
@section('title', '客户拜访管理')
@section('content')
									<form class="form-horizontal" action="{{url('yewu/update/'.$yewu->y_id)}}" method="post" role="form" >
										@csrf
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 业务员名称 </label>

										<div class="col-sm-9">
											<input type="text" value="{{$yewu->y_name}}" id="form-field-1"  name="y_name"  class="col-xs-10 col-sm-5 adminusername" id="pwd" />
										</div>

									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 业务员性别</label>

										<div class="col-sm-9">
											<input type="radio" value="1" name="y_sex" @if($yewu->y_sex==1)checked @endif>男
											<input type="radio" value="2" name="y_sex" @if($yewu->y_sex==2)checked @endif>女
										</div>

									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 办公电话</label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1"  value="{{$yewu->y_tels}}" name="y_tels"  class="col-xs-10 col-sm-5" id="pwd" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 手机号</label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1"  value="{{$yewu->y_tel}}"  name="y_tel"  class="col-xs-10 col-sm-5" id="pwd" />
										</div>
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
	$(document).on('blur','.adminusername',function(){
		var a_name = $(this).val();
		// alert(a_name)
		$.get('/yewu/createpost',{a_name:a_name},function(res){
			// alert(res)/
			if(res>0){
				alert("名称已存在");
			}
		})
	})
</script>	

@endsection			
						