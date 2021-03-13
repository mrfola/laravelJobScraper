<!-- header bar -->
@include('layouts.header')

<body>
    <!-- nav bar -->
    @include('components.nav-bar')

    

    <div class="container">
    <!-- search bar -->      
    @include('components.search-bar')

    <!-- Button trigger modal -->
  </div>


    @if(@isset($data))
        @include('components.scraped-jobs')
    @else
    <div class="container">
        <p> Search for a tech job</p>
    </div>
    @endif
    </div>
    
</body>

</html>
