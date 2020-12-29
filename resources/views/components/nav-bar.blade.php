<nav style=" text-align:center; background: #6d489c; padding: 2em 0em; margin-bottom:2em;">
    <p class="font-semibold text-xl" style="font-size:1.5em; color:white;">Laravel Jobs Scraper</p>
    <p>
            <a class="font-semibold text-xl" style="font-size:1em; color:white;" href="/">Home</a> <span style="color:white;"> | </span>
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline" style="font-size:1em; color:white;">Dashboard</a> <span style="color:white;"> | </span>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 underline" style="font-size:1em; color:white;">Login</a><span style="color:white;"> | </span>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline" style="font-size:1em; color:white;">Register</a>
                    @endif
                @endauth
        @endif
          
    </p>
</nav>