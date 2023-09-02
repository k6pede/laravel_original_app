
<div id="header" class="header">
  {{-- <nav class="navbar navbar-expand-md navbar-light shadow-sm">
      <div class="container">
          <a class="navbar-brand" href="{{ url('/') }}">
              {{ config('app.name', 'Laravel') }}
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
              <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <!-- Left Side Of Navbar -->
              <ul class="navbar-nav me-auto">

              </ul>

              <!-- Right Side Of Navbar -->
              <ul class="navbar-nav ms-auto">
                  <!-- Authentication Links -->
                  @guest
                      @if (Route::has('login'))
                          <li class="nav-item">
                              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                          </li>
                      @endif

                      @if (Route::has('register'))
                          <li class="nav-item">
                              <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                          </li>
                      @endif
                  @elseif(Auth::check())
                        @if(Auth::user() instanceof App\Models\Admin)
                          <p>admin</p>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endif
                  @endguest
              </ul>
          </div>
      </div>
  </nav> --}}
  {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @if(!Auth::check() && (!isset($authgroup) || !Auth::guard($authgroup)->check()))
                    @if (Route::has('login'))
                        <li class="nav-item">
                            @isset($authgroup)
                            <a class="nav-link" href="{{ url("login/$authgroup") }}">{{ __('Login') }}</a>
                            @else
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            @endisset
                        </li>
                    @endif

                    @if (Route::has('register'))
                    @isset($authgroup)
                    @if (Route::has("$authgroup-register"))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route("$authgroup-register") }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                    @else
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                    @endisset
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            @isset($authgroup)
                            {{ Auth::guard($authgroup)->user()->name }}
                            <p>header</p>
                            @else
                            {{ Auth::user()->name }}
                            <p>header.blade.php</p>
                            @endisset
                        </a>

                        

                        
                    </li>
                @endif
                {{-- @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest 
            </ul>
        </div>
    </div>
</nav> --}}
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <div class="navbar-brand-div">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ asset('images/logo.png') }}" alt="logo" class="logo">
                        {{-- {{ config('app.name', 'Laravel') }} --}}
                    </a>
                    <p class="mb-0 text-center" style="color: black; opacity: .55; font-size: .6em">推しの誕生日,カレンダー REmemo</p>

                </div>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        {{-- ログアウト時 --}}
                       
                        @if(!Auth::guard('admin')->check() && !Auth::check())
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    @isset($authgroup)
                                    <a class="nav-link" href="{{ url("login/$authgroup") }}">{{ __('messages.Login') }}</a>
                                    @else
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('messages.Login') }}</a>
                                    @endisset
                                </li>
                            @endif

                            @if (Route::has('register'))
                            @isset($authgroup)
                            @if (Route::has("$authgroup-register"))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route("$authgroup-register") }}">{{ __('messages.Register') }}</a>
                                </li>
                            @endif
                            @else
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('messages.Register') }}</a>
                                </li>
                            @endif
                            @endisset
                            @endif
                        @else
                        {{-- ログイン時 --}}
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    @if(Auth::guard('admin')->check())
                                        {{ Auth::guard('admin')->user()->name }}
                                
                                    @else
                                        {{ Auth::user()->name }}
                                
                                    @endif
                                </a>
                                {{-- <div class="" aria-labelledby="navbarDropdown"> --}}
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                                
                                
                            </li>
                        
                        @endif
                            
                    </ul>
                </div>
            </div>
                
        </nav>


    </div>
</div>
