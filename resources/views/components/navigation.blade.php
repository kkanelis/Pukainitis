<nav class="navbar">
    <div class="navcontainer">
        <div class="logo">🐾 Pūkainītis</div>
        <ul class="nav-links">

            @auth
                @if (Auth::user()->admin == 1)
                    <li class="nav-item"><a href="/admin" class="nav-link">Admin Panelis</a></li>
                @endif
                <li class="nav-item"><a href="/animal" class="nav-link">Meklēt savu pūkainīti</a></li>
                <li class="nav-item">
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="nav-logout">Izlogoties</button>
                    </form>
                </li>
            @endauth

            @guest
                <li class="nav-item"><a href="/" class="nav-link">Sākums</a></li>
                <li class="nav-item"><a href="/register" class="nav-link">Reģistrēties</a></li>
                <li class="nav-item"><a href="/login" class="nav-link">Pieslēgties</a></li>
            @endguest
        
        </ul>
    </div>
</nav>