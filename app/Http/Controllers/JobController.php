<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User_Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Save job to database
     * 
     */

    public function save_job(Request $request)
    {
        $user_id = Auth()->id();
        $new_job = new Job();
        $new_job["user_id"] = $user_id;
        $new_job["job_data_id"] = $request["job_data_id"];
        $new_job["job_site"] = $request["job_data_id"];
        $new_job["base_search_uri"] = $request["base_search_uri"];
        $new_job["parent_dom"] = $request["parent_dom"];
        $new_job["job_title"] = $request["job_title"];
        $new_job["job_location"] = $request["job_location"];
        
        if($new_job->save())
        {
            $data["message"] = "User successfully saved.";
            return redirect(route('home'));
        }
    }


    public function delete_job(Request $request, Job $job)
    {        
        if($job->delete())
        {
            return redirect(route('home'));
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        //
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
        //
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
}
