<nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <div class="container">
        <a class="navbar-brand" href="#">Parking</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link {{setActive('/')}}" aria-current="page" href="{{route('dashboard.index')}}">Home</a>
                </li>
                @if(isset(auth()->user()->name))
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{explode(" ", auth()->user()->name)[0]}}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><a class="dropdown-item" href="#">Bookings</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#" onclick="event.preventDefault();document.getElementById('UserLogOutForm').submit();">Logout</a></li>
                    </ul>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link {{setActive('login')}}" href="{{route('login')}}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{setActive('register')}}" href="{{route('register')}}">Register</a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
