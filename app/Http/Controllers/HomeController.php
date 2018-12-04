<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\User;
use App\ProjectType;
use App\Tag;
use App\Projects;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $datas = User::where('role',"worker")->get();
        $datas = User::where('role',"worker")->get();
        foreach ($datas as $data) {
            $data->tags = $data->usertag()->get();
        }
        $datas_count = count($datas);
        return view('pages.workers',compact('datas','datas_count'));
    }

    public function userdetail($id){
        $data = User::find($id);
        $data->tags = $data->usertag()->get();
        $data_projects = Projects::where('user_id',Auth::user()->id)->get();
        $data_finish_projects = Projects::where('user_id',Auth::user()->id)->where('pstatus',"finished")->get();
        $data_ontime_projects = Projects::where('user_id',Auth::user()->id)->where('pstatus',"finished")->where('pketerangan',"on time")->get();
        $data_ongoing_projects = Projects::where('user_id',Auth::user()->id)->where('pstatus',"on going")->get();
        $n_data_projects = count($data_projects);
        $n_data_finish_projects = count($data_finish_projects);
        $n_data_ontime_projects = count($data_ontime_projects);
        $n_data_ongoing_projects = count($data_ongoing_projects);
        if ($n_data_finish_projects==0) {
            $precentage = 0;
        }
        else{
            $precentage = $n_data_ontime_projects/$n_data_finish_projects*100;    
        }
        
        return view('pages.userdetail',compact('data','n_data_projects','n_data_finish_projects','n_data_ontime_projects','n_data_ongoing_projects','precentage'));   
    }

    public function profile()
    {
        $data = User::find(Auth::user()->id);
        $data->tags = $data->usertag()->get();
        $data_projects = Projects::where('user_id',Auth::user()->id)->get();
        $data_finish_projects = Projects::where('user_id',Auth::user()->id)->where('pstatus',"finished")->get();
        $data_ontime_projects = Projects::where('user_id',Auth::user()->id)->where('pstatus',"finished")->where('pketerangan',"on time")->get();
        $data_ongoing_projects = Projects::where('user_id',Auth::user()->id)->where('pstatus',"on going")->get();
        $n_data_projects = count($data_projects);
        $n_data_finish_projects = count($data_finish_projects);
        $n_data_ontime_projects = count($data_ontime_projects);
        $n_data_ongoing_projects = count($data_ongoing_projects);
        if ($n_data_finish_projects==0) {
            $precentage = 0;
        }
        else{
            $precentage = $n_data_ontime_projects/$n_data_finish_projects*100;    
        }
        return view('pages.profile',compact('data','n_data_projects','n_data_finish_projects','n_data_ontime_projects','n_data_ongoing_projects','precentage'));
    }

    public function saveProfile(Request $request)
    {
        $res = User::where('id',Auth::user()->id)->update([
            'github' => $request->github,
            'website' => $request->website,
            'phone' => $request->phone,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'descTitle' => $request->descTitle,
            'describe' => $request->describe,
        ]);

        $data = User::find(Auth::user()->id);
        return Response::json($data);
    }

    public function navbarData()
    {
        $datas = ProjectType::all();
        return Response::json($datas);
    }

    public function sidenavData()
    {
        return Response::json( Tag::all() );
    }
}
