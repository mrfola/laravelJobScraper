@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1>Saved Jobs</h1>
    </div>
        @isset($message)
            <p>{{$message}}</p>
        @endisset

        @isset($jobs)
        <div class="row gx-5">
            @foreach($jobs as $job)           
            
                    <div class="col-sm-4">
                        <div class="p-3 border bg-light my-2">
                            <div class="top-panel">
                                <span class="bg-dark" style="float:right; color:white; padding:0.3em 1em; display:inline-block;">{{$job["job_site"]}} </span>
                                <div class="py-3">
                                    <a href={{$job["job_url"]}} class="font-bold text-lg mb-2">{{$job["job_title"]}}</a>
                                    <p class="text-gray-700 text-base">{{$job["job_location"]}}</p>
                                </div>
                            </div>
                            
                            <div  class="flex justify-between px-6 pt-2 pb-4" style="display:flex; justify-content:space-evenly;">                            
                                <span class="text-gray-700 text-sm">Date Saved: <br> {{$job["created_at"]}} </span>  
                                <span class="text-gray-700 text-sm">Last Refreshed: <br> {{$job["updated_at"]}} </span>        
                            </div>
                            <!-- bottom layer of card (containing refresh and delete buttons) -->
                            <div  class="flex justify-between px-6 pt-2 pb-4" style="display:flex; justify-content:space-evenly;">                            
                                <button class="btn btn-success" style="border-radius:0px;"> Refresh </button>
                                <button style=" border-radius:0px;" id="deleteJob" class="btn btn-danger" data-job-id="{{$job["id"]}}" data-toggle="modal" data-target="#deleteJob" type="button"> Delete </button>
                            </div>
                        </div>
                    </div> 
            
            @endforeach
        </div>

        @else
            <p>You have not saved any job yet</p>
        @endisset
</div>
@endsection

              <!-- Modal -->
<div class="modal fade" id="deleteJob" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Are you sure you want to delete?</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            This action cannot be reversed. <br><br> Are you sure you want to delete  this job?
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <form method="POST" action="/job/{{$job['id']}}/delete">
            @csrf
            @method('DELETE')
                <button type="submit" class="btn btn-primary" href="#">Delete</button>
            </form>
            </div>
      </div>
    </div>
</div>