@extends('layouts.app')
@section('title', '客户拜访管理')
@section('content')
									<form class="form-horizontal" action="{{url('kehu/update/'.$kehu->k_id)}}" method="post" role="form" >
										@csrf
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 客户名称 </label>

										<div class="col-sm-9">
											<input type="text" value="{{$kehu->k_name}}" id="form-field-1"  name="k_name"  class="col-xs-10 col-sm-5 adminusername" id="pwd" />
										</div>

									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 客户级别</label>

										<div class="col-sm-9">
											<select name="k_level" id="">
												<option value="">请选择</option>
												<option value="1" @if($kehu->k_level==1)selected @endif>一级客户</option>
												<option value="2" @if($kehu->k_level==2)selected @endif>二级客户</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 客户从事行业</label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1"  name="k_hang"  value="{{$kehu->k_hang}}" class="col-xs-10 col-sm-5" id="pwd" />
										</div>

									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 客户来源</label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1"  name="k_lai" value="{{$kehu->k_lai}}" class="col-xs-10 col-sm-5" id="pwd" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 业务员</label>

										<div class="col-sm-9">
											<select name="y_id" id="">
												<option value="">请选择</option>
												@foreach($yewu as $k=>$v)
												<option value="{{$v->y_id}}" @if($v->y_id==$kehu->y_id)selected @endif>{{$v->y_name}}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 电话</label>

										<div class="form-group">
											<input type="text" id="form-field-1"  name="k_tels"  value="{{$kehu->k_tels}}" class="col-xs-10 col-sm-5" id="pwd" />
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 手机</label>

										<div class="form-group">
											<input type="text" id="form-field-1"  name="k_tel"  value="{{$kehu->k_tel}}" class="col-xs-10 col-sm-5" id="pwd" />
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



@endsection			
						