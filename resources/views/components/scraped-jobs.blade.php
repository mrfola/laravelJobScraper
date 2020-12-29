
    <!-- row -->
    <div class="container overflow-hidden">
 
        @foreach($data as $job_website)
            @isset($job_website['titles'])

            <div class="row gx-5">
                @foreach($job_website['titles'] as $key => $title)
                    <div class="col-sm-4">
                        <div class="p-3 border bg-light my-2">
                            <div class="top-panel">
                                <span class="bg-dark" style="float:right; color:white; padding:0.3em 1em; display:inline-block;">{{$job_website["name"]}} </span>
                                <div class="py-3">
                                    <div class="font-bold text-lg mb-2">{{$title}}</div>
                                    <p class="text-gray-700 text-base">{{isset($location[$key]) ? $location[$key] : 'N/A'}}</p>
                                </div>
                            </div>
                            <!-- bottom layer of card (containing link and time) -->
                            <div  class="flex justify-between px-6 pt-2 pb-4"> 
                               {{-- @isset($links[$key])
                                    <a href={{$links[$key]['href']}} class="font-bold text-indigo-700 text-base mx-2 py-1 px-3" style="background:#222;color:#ffffff;"> View </a>
                                @endisset --}}
                                <span class="text-gray-700 text-sm"> {{isset($dates[$key]) ? $dates[$key] : 'N/A'}} </span>
                            </div>
                        </div>
                    </div> 
                @endforeach
            </div>
            @endisset
        @endforeach
    </div>
