<nav class="navbar navbar-expand-md navbar-light shadow-sm">
  <div class="container d-flex justify-content-between align-items-center">
    <div class="home">
        <a href="{{ url('/home') }}" class="ms-1 text-decoration-none">
            <i class="fa-solid fa-house fa-lg"></i>
        </a>
    </div>

    <div class="app_name text-center flex-grow-1">
        <h2 class="my-2 ms-5"> {{ config('app.name') }}</h2>
    </div>
      

      <div class="navbar-nav ms-auto d-flex align-items-center">
        <!-- Authentication Links -->
        @guest
            @if (Route::has('login'))
                <a class="nav-link me-3" href="{{ route('login') }}">
                    <i class="fa-solid fa-right-to-bracket icon_sm "></i> Login
                </a>
            @endif

            @if (Route::has('register'))
                <a class="nav-link me-3" href="{{ route('register') }}">
                    <i class="fa-solid fa-user-plus icon_sm"></i> Register
                </a>
            @endif
        @else
            <!-- edit icon -->
            <a href="#" class="nav-link me-4 d-flex align-items-center edit_event">
                <i class="fa-solid fa-pen fa-lg"></i>
            </a>

            <!-- setting icon -->
            <a  href="#" class="nav-link d-flex align-items-center setting">
                <i class="fa-solid fa-user me-3 fa-lg"></i>
            </a>

   
        @endguest
    </div>
  </div>
</nav>

{{-- ユーザページにログアウトボタン --}}
{{-- <a class="nav-link ms-3" href="{{ route('logout') }}"
onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
 <i class="fa-solid fa-right-from-bracket icon_sm"></i> Logout
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
 @csrf
</form> --}}