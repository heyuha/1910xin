@extends('layouts.app')
@section('title', '客户拜访管理')
@section('content')
									<form class="form-horizontal" action="{{url('meeting/update/'.$meeting->m_id)}}" method="post" role="form" >
										@csrf
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 业务员名称 </label>

										<div class="col-sm-9">
											<select name="y_id" id="">
												<option value="">请选择</option>
												@foreach($yewu as $k=>$v)
												<option value="{{$v->y_id}}" @if($v->y_id=$meeting->y_id)selected @endif>{{$v->y_name}}</option>
												@endforeach
											</select>
											<b style="color:red">{{$errors->first('y_id')}}</b>
										</div>

									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 客户名称</label>

										<div class="col-sm-9">
											<select name="k_id" id="">
												<option value="">请选择</option>
												@foreach($kehu as $k=>$v)
												<option value="{{$v->k_id}}" @if($v->k_id=$meeting->k_id)selected @endif>{{$v->k_name}}</option>
												@endforeach
											</select>
											<b style="color:red">{{$errors->first('k_id')}}</b>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 访问人</label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1" value="{{$meeting->m_man}}" name="m_man"  class="col-xs-10 col-sm-5" id="pwd" />
										<b style="color:red">{{$errors->first('m_man')}}</b>
										</div>

									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 访问地址</label>

										<div class="col-sm-9">
											<input type="text" id="form-field-1" value="{{$meeting->m_url}}"  name="m_url"  class="col-xs-10 col-sm-5" id="pwd" />
											<b style="color:red">{{$errors->first('m_url')}}</b>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 访问详情</label>

										<div class="col-sm-9">
											<textarea name="m_desc" id="" cols="30" rows="10">{{$meeting->m_desc}}</textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 下次访问时间</label>

										<div class="form-group">
											<label for="date"></label>
											<input type="date" name="m_ntime" id="date" value="" />
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
						