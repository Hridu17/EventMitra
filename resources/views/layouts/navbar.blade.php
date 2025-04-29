<header>
    <div class="navbar">
        <div>EventMitra.</div>
        <nav>
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('aboutUs') }}">About Us</a></li>
                <li><a href="{{ route('eventmitra.decoration') }}">Decoration</a></li>
                <a href="{{ route('kind.words') }}">KindWords</a>
                @guest
                    {{-- If user is not logged in --}}
                    <li><a href="{{ route('login') }}">Login</a></li>
                @else
                    {{-- If user is logged in --}}
                    <li>
                        <a href="{{ route('dashboard') }}" title="Dashboard">
                            <i class="fas fa-user-circle" style="font-size: 20px;"></i>
                        </a>
                    </li>
                @endguest
            </ul>
        </nav>
    </div>
</header>
