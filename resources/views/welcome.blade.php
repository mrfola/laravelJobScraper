<!-- header bar -->
@include('layouts.header')

<body>
    <!-- nav bar -->
    @include('components.nav-bar')

    <div class="container">
    <!-- search bar -->      
    @include('components.search-bar')
    

    @if(@isset($data))
        @include('components.scraped-jobs')
    @else
        <p> Search for a tech job</p>
    @endif
    </div>
    
</body>

</html>
