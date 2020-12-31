<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="">
                    @isset($message)
                        <p>{{$message}}</p>
                    @endisset
    
                    @isset($jobs)
                    @foreach($jobs as $job)           
                        <div class="row gx-5">
                                <div class="col-sm-4">
                                    <div class="p-3 border bg-light my-2">
                                        <div class="top-panel">
                                            <span class="bg-dark" style="float:right; color:white; padding:0.3em 1em; display:inline-block;">{{$job["job_site"]}} </span>
                                            <div class="py-3">
                                                <div class="font-bold text-lg mb-2">{{$job["job_site"]}}</div>
                                                <p class="text-gray-700 text-base">{{$job["job_site"]}}</p>
                                            </div>
                                        </div>
                                        <!-- bottom layer of card (containing link and time) -->
                                        <div  class="flex justify-between px-6 pt-2 pb-4">                            
                                            <span class="text-gray-700 text-sm"> {{$job["job_site"]}} </span>         
                                        </div>
                                    </div>
                                </div> 
                        </div>
                    @endforeach
                    @endisset
                </div>
    
            </div>
        </div>
    </div>
</x-app-layout>
