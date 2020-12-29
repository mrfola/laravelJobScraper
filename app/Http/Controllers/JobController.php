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
        
        if($new_job->save())
        {
            $new_user_job = new User_Job();
            $new_user_job["user_id"] = $user_id;
            $new_user_job["job_id"] = $new_job->id;

            if($new_user_job->save())
            {
                $data["message"] = "User successfully saved.";
                redirect(route('home'), $data);// view('dashboard', $data);
            }
        }
    }


    public function get_user_jobs()
    {
        $user = Auth()->user();
        $user_jobs = $user->Jobs()->get();
        $data["jobs"] = $user_jobs;
        //return view('dashboard', $data);
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
