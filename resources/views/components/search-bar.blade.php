<div class="md:container md:mx-auto" style="margin-bottom:1em;">
    <div class="row">
        <h1 style="font-size:1.5em; margin-bottom:1em;"> Find Your Dream Tech Job </h1>
    </div>
    
    <form class="form-floating" method="GET" action="{{route('get_search_results')}}">
        @csrf
            <div class="row">
            <div class="col-sm-10">
                <input type="text" style="width:100%" class="form-control" name="search_term" id="searchBar" placeholder="Search For A Tech Job... (e.g Python Developer)">
            </div>
            <div class="col-sm-2">
                <button type="submit" class="btn btn-dark">Search</button>
            </div>
            </div>

    </form>
</div>