<?php

namespace App\Http\Controllers;

use Response;
use App\User;
use App\Projects;
use App\ProjectTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Projects::orderBy('created_at','desc')->get();
        foreach ($datas as $data ) {
            $data->ptags = $data->projecttag()->get();
        }
        $datas_count = count($datas);
        return view('pages.home',compact('datas','datas_count'));
    }

    public function byProjectType($type)
    {
        $datas = Projects::where('projecttype_id',$type)->orderBy('created_at','desc')->get();
        foreach ($datas as $data ) {
            $data->ptags = $data->projecttag()->get();
        }
        $datas_count = count($datas);
        return view('pages.home',compact('datas','datas_count'));
    }

    public function projectdetail($id)
    {
        $data = Projects::find($id);
        $data->ptags = $data->projecttag()->get();
        return view('pages.project',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.postproject');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ret = Projects::create([
            'user_id'=>Auth::user()->id,
            'projecttype_id'=>$request->projecttype_id,
            'worker_id'=>"no worker",
            'pname'=>$request->pname,
            'pdescription'=>$request->pdescription,
            'pprice'=>$request->pprice,
            'pduration'=>$request->pduration,
            'pstatus'=>"on going",
        ]);

        $data = Projects::where('user_id',Auth::user()->id)->orderBy('created_at','desc')->first();
        $id = $data->id;
        $temp = explode('|',$request->ptags);
        for ($i=0; $i < count($temp); $i++) { 
            ProjectTag::create([
                'projects_id'=>$id,
                'ptag'=>$temp[$i],
            ]);
        }

        if($ret){
            return Response::json([
                'status' => 'success'
            ]);    
        }
        return Response::json([
            'status' => 'failed'
        ]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function show(Projects $projects)
    {
        //
    }

    public function myprojects()
    {
        $datas = Projects::where('user_id',Auth::user()->id)->where('worker_id','<>',"no worker")->get();
        foreach ($datas as $data) {
            $worker = User::find($data->worker_id);
            $data->worker_id = $worker->firsname+" "+$worker->lastname;
        }

        return view('pages.myproject',compact('datas'));
    }

    public function mywprojects()
    {
        $datas = Projects::where('worker_id',Auth::user()->id)->get();
        foreach ($datas as $data) {
            $worker = User::find($data->worker_id);
            $data->worker_id = $worker->firsname+" "+$worker->lastname;
        }

        return view('pages.myproject',compact('datas'));
    }

    public function myrequest()
    {
        $datas = Projects::where('user_id',Auth::user()->id)->where('worker_id',"no worker")->get();
        foreach ($datas as $data) {
            $worker = $data->penawaran()->get();
            foreach ($worker as $nama_worker) {
                $nama = $nama_worker->user()->get();
                foreach ($nama as $nm) {
                    $nama_worker->wname = $nm->firstname." ".$nm->lastname;
                }
            }
            $data->worker_names = $worker;
        }

        return view('pages.myrequest',compact('datas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function edit(Projects $projects)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Projects $projects)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function destroy(Projects $projects)
    {
        //
    }
}
