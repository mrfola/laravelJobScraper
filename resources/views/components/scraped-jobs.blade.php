  <!-- Modal -->
  <div class="modal fade" id="saveJob" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Login Required</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          You need to login to be able to save jobs
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <a type="button" class="btn btn-primary" href={{route('login')}}>Login</a>
        </div>
      </div>
    </div>
  </div>


    <div class="container overflow-hidden">
 
        @foreach($data as $job_website)
       
            @isset($job_website['titles'])

            <!-- row -->

            <div class="row gx-5">
                @foreach($job_website['titles'] as $key => $title)
                    <div class="col-sm-4">
                        <div class="p-3 border bg-light my-2">
                            <div class="top-panel">
                                <span class="bg-dark" style="float:right; color:white; padding:0.3em 1em; display:inline-block;">{{$job_website["name"]}} </span>
                                <div class="py-3">
                                    <div class="font-bold text-lg mb-2">{{$title}}</div>
                                    <p class="text-gray-700 text-base">{{isset($job_website["location"][$key]) ? $job_website["location"][$key] : 'N/A'}}</p>
                                </div>
                            </div>
                            <!-- bottom layer of card (containing time) -->
                            <div  class="flex justify-between px-6 pt-2 pb-4">                     
                                <span class="text-gray-700 text-sm"> {{isset($job_website["dates"][$key]) ? $job_website["dates"][$key] : 'N/A'}} </span>
                                @guest
                                <button style="float:right; background:#6d489c;color:white; border-radius:0px;" id="saveJob" class="btn" data-toggle="modal" data-target="#saveJob" type="button"> Save Job </button>
                                @endguest 
                                @auth
                                <form method="POST" action="{{route('save_job')}}">
                                    @csrf
                                    <input hidden name="job_data_id" value="{{$job_website['job_data_id']}}" />
                                    <input hidden name="base_search_uri" value="{{$job_website['base_search_uri']}}" />
                                    <input hidden name="parent_dom" value="{{$job_website['parent_dom']}}" />
                                    <input hidden name="job_location" value="{{isset($job_website["location"][$key]) ? $job_website["location"][$key] : 'N/A'}}" />
                                    <input hidden name="job_title" value="{{$title}}" />
                                    <button style="float:right; background:#6d489c;color:white; border-radius:0px;" id="saveJob" class="btn" type="submit"> Save Job </button>
                                </form>
                                @endauth  
                            </div>
                        </div>
                    </div> 
                @endforeach
            </div>
            @endisset
        @endforeach
    </div>


  
 
