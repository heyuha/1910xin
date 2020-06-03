<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreMeetingPost;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Yewu;
use App\Kehu;
use App\Meeting;
class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $meeting = Meeting::select('meeting.*','kehu.k_name','yewu.y_name')
                            ->leftjoin('kehu','kehu.k_id','=','meeting.k_id')
                            ->leftjoin('yewu','yewu.y_id','=','meeting.y_id')
                            ->paginate(3);
        // dd($meeting);
        if(request()->ajax()){
            return view("meeting.indexajax",['meeting'=>$meeting]);
        }
        return view("meeting.index",['meeting'=>$meeting]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kehu = Kehu::all();
        $yewu = Yewu::all();

        return view('meeting.create',['kehu'=>$kehu,'yewu'=>$yewu]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMeetingPost $request)
    {
        $post = $request->except("_token");
        // dd($post);
        $post['m_time'] = time();
        // dd($post);
        $post['m_ntime'] = time();
        $res = Meeting::create($post);
        // dd($res);
        if($res){
            return redirect('/meeting');
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
        // echo $id;
        $yewu = Yewu::all();
        $kehu = Kehu::all();
        $meeting = Meeting::where('m_id',$id)->first();

        return view("meeting.edit",['yewu'=>$yewu,'kehu'=>$kehu,'meeting'=>$meeting]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreMeetingPost $request, $id)
    {
        $post = $request->except("_token");
        $post['m_ntime'] = time();
        $post['m_time'] = time();
        $res = Meeting::where('m_id',$id)->update($post);
        if($res!==false){
            return redirect("/meeting");
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
    public function delete(){
        $m_id = request()->m_id;
        // echo $m_id;
        $res = Meeting::where('m_id',$m_id)->delete();
        if($res){
            echo  json_encode(['code'=>'00000','msg'=>'删除成功']);die;
        }
    }
}
