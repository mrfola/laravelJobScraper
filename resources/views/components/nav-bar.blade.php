<nav style=" text-align:center; background: #6d489c; padding: 1.5em 0em; margin-bottom:2em;">
    <p class="font-semibold text-xl" style="font-size:1.5em; color:white;">Laravel Jobs Scraper</p>
    <p>
            <a class="font-semibold text-xl" style="font-size:1em; color:white;" href="/">Home</a> 
            @if (Route::has('login'))
                @auth
                    <span style="color:white;"> | </span>
                    <a href="{{ route('home') }}" class="text-sm text-gray-700 underline" style="font-size:1em; color:white;">Dashboard</a>
                @endauth
                @guest
                    <span style="color:white;"> | </span>
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 underline" style="font-size:1em; color:white;">Login</a><span style="color:white;"> | </span>
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline" style="font-size:1em; color:white;">Register</a>
                @endguest
                
        @endif
          
    </p>
</nav>