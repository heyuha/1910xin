<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreAdminPost;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = Admin::paginate(3);

        if(request()->ajax()){
            return view("admin.indexajax",['admin'=>$admin]);
        }
        // dd($admin);
        return view("admin.index",['admin'=>$admin]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdminPost $request)
    {
        $post =$request->except("_token");
        $post['a_pwd'] = encrypt($post['a_pwd']);
        // dd($post);
        $res = Admin::create($post);
        if($res){
            return redirect('admin/');
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
        $admin = Admin::where('a_id',$id)->first();
        // dd($admin);
        // 解密密码传给试图
        $pwd = decrypt($admin['a_pwd']);
        return view("admin.edit",['admin'=>$admin,'pwd'=>$pwd]);
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
        // echo $id;
        $post = $request->except("_token");
        $post['a_pwd'] = encrypt($post['a_pwd']);
        $res = Admin::where('a_id',$id)->update($post);
        if($res!==false){
            return redirect("/admin");
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
        $res = Admin::where("a_id",$id)->delete();
        if($res){
            return redirect("/admin");
        }
    }
    // ajax删除
    public function delete(){
        $a_id =  request()->a_id;
        // echo $a_id;
        $res = Admin::where('a_id',$a_id)->delete();
        if($res){
            echo json_encode(['code'=>'00000','msg'=>"删除成功"]);die;
        }
    }
    // js验证名称唯一性
    public function createpost(){
        $a_name = request()->a_name;
        // echo $a_name;
        $count = Admin::where('a_name',$a_name)->count();
        echo $count;
    }
}
