<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Yewu;
class YewuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $y_name = request()->y_name;
        $where = [];
        if($y_name){
            $where[] = ['y_name','like',"%$y_name%"];
        }

        $yewu = Yewu::where($where)->paginate(3);
        if(request()->ajax()){
            return view("yewu.indexajax",['yewu'=>$yewu,'y_name'=>$y_name]);
        }
        return view("yewu.index",['yewu'=>$yewu,'y_name'=>$y_name]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("yewu.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = $request->except("_token");
        // dd($post);
        $res = Yewu::create($post);
        if($res){
            return redirect("/yewu");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $yewu = Yewu::where('y_id',$id)->first();
        return view("yewu.edit",['yewu'=>$yewu]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = $request->except("_token");
        $res = Yewu::where('y_id',$id)->update($post);
        //
        if($res!==false){
            return redirect("/yewu");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function createpost(){
        $y_name = request()->a_name;
        // dd($y_name);
        $res = Yewu::where('y_name',$y_name)->count();
        echo $res;
    }
    public function delete(){
         $y_id = request()->m_id;
        // echo $m_id;
        $res = Yewu::where('y_id',$y_id)->delete();
        if($res){
            echo  json_encode(['code'=>'00000','msg'=>'删除成功']);die;
        }
    }
}
