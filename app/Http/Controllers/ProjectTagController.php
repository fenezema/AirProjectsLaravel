<?php

namespace App\Http\Controllers;

use Response;
use App\ProjectTag;
use Illuminate\Http\Request;

class ProjectTagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function pricer($price)
    {
        $string_price = number_format($price,2,',','.');
        return $string_price;
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function searchBasedOnSkills(Request $req)
    {
        $temp = $req->isi;

        $n_temp = count($temp);
        if ($n_temp==5) {
            $datas = ProjectTag::where('ptag',$temp[4])->orWhere('ptag',$temp[3])->orWhere('ptag',$temp[2])->orWhere('ptag',$temp[1])->orWhere('ptag',$temp[0])->groupBy('projects_id')->orderBy('created_at','desc')->get();
            
        }
        if ($n_temp==4) {
            $datas = ProjectTag::where('ptag',$temp[3])->orWhere('ptag',$temp[2])->orWhere('ptag',$temp[1])->orWhere('ptag',$temp[0])->groupBy('projects_id')->orderBy('created_at','desc')->get();
            
        }
        if ($n_temp==3) {
            $datas = ProjectTag::where('ptag',$temp[2])->orWhere('ptag',$temp[1])->orWhere('ptag',$temp[0])->groupBy('projects_id')->orderBy('created_at','desc')->get();
            
        }
        if ($n_temp==2) {
            $datas = ProjectTag::where('ptag',$temp[1])->orWhere('ptag',$temp[0])->groupBy('projects_id')->orderBy('created_at','desc')->get();
            
        }
        if ($n_temp==1) {
            $datas = ProjectTag::where('ptag',$temp[0])->groupBy('projects_id')->orderBy('created_at','desc')->get();
            
        }
        foreach ($datas as $data) {
            $data->{"projects"} = $data->projects()->get();
            foreach ($data->projects as $project) {
                $temp = $project->projecttype()->get();
                foreach ($temp as $tp) {
                    $project->{"projecttype_names"} = $tp->type_name;
                }
                $project->ptags = $project->projecttag()->get();
                $project->pprice = $this->pricer(floatval($project->pprice));
            }
        }
        
        return Response::json($datas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProjectTag  $projectTag
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectTag $projectTag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProjectTag  $projectTag
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectTag $projectTag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProjectTag  $projectTag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectTag $projectTag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProjectTag  $projectTag
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectTag $projectTag)
    {
        //
    }
}
