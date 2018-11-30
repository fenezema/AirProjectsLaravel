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
        $datas = Projects::all();
        $datas_count = count($datas);
        return view('pages.home',compact('datas','datas_count'));
    }

    public function profile()
    {
        $data = User::find(Auth::user()->id);
        return view('pages.profile',compact('data'));
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
        return Response::json(ProjectType::all());
    }

    public function sidenavData()
    {
        return Response::json( Tag::all() );
    }
}
