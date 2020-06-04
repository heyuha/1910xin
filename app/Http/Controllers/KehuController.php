<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreKehuPost;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Yewu;
use App\Kehu;
class KehuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $k_name = request()->k_name;
        $where = [];
        if($k_name){
            $where[] = ['k_name','like',"%$k_name%"];
        }



        $kehu = Kehu::select('kehu.*','yewu.y_name')
                    ->leftjoin('yewu','yewu.y_id','=','kehu.y_id')
                    ->where($where)
                    ->paginate(3);
        if(request()->ajax()){
             return view("kehu.indexajax",['kehu'=>$kehu,'k_name'=>$k_name]);
        }
        return view("kehu.index",['kehu'=>$kehu,'k_name'=>$k_name]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $yewu = Yewu::all();
        return view("kehu.create",['yewu'=>$yewu]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKehuPost $request)
    {
        $post = $request->except("_token");
        // dd($post);
        $res = Kehu::create($post);
        if($res){
            return redirect("/kehu");
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
        $yewu = Yewu::all();
        $kehu = Kehu::where('k_id',$id)->first();
        return view("kehu.edit",['yewu'=>$yewu,'kehu'=>$kehu]);
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
        $res = Kehu::where('k_id',$id)->update($post);
        if($res!==false){
            return redirect("/kehu");
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
        $res = Kehu::where('k_name',$y_name)->count();
        echo $res;
    }
    public function delete(){
        $m_id = request()->m_id;
        // echo $m_id;
        $res = Kehu::where('k_id',$m_id)->delete();
        if($res){
            echo  json_encode(['code'=>'00000','msg'=>'删除成功']);die;
        }
    }
}
