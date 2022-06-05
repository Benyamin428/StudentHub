<!-- Bootstrap Navbar -->

<nav class="navbar navbar-default">
  <div class="container">
      <div class="navbar-header">

          <!-- Once screen gets reduced to a certain size, the navbar will be replaced with a toggle button -->
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
              <span class="sr-only">Toggle Navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
          </button>

          <!-- Branding Image -->
          <a class="navbar-brand font-color" href="{{ url('/') }}">
            <img src="/studenthub/public/img/logo.png">
          </a>
      </div>

      <div class="collapse navbar-collapse" id="app-navbar-collapse">
          <!-- Left Side Of Navbar -->
          <ul class="nav navbar-nav">
              &nbsp;
          </ul>

          <ul class="nav navbar-nav">
            <li><a href="posts" class="font-color">Blog</a></li>
            @if (Auth::user()) <!-- If user is authenticated, they will be able to see extra links -->
                <li><a href="/studenthub/public/assignments" class="font-color">Assignments</a></li>
                <li><a href="/studenthub/public/group_chat" class="font-color">Group Chat</a></li>
            @endif
          </ul>

          <!-- Right Side Of Navbar -->
          <ul class="nav navbar-nav navbar-right">
              <!-- Authentication Links -->
              @if (Auth::guest()) <!-- If user is just a guest, they'll be limited to seeing only certain links -->
                  <li><a href="{{ route('login') }}" class="font-color">Login</a></li>
                  <li><a href="{{ route('register') }}" class="font-color">Register</a></li>
              @else
                  <li class="dropdown">
                      <a href="#" class="dropdown-toggle font-color" data-toggle="dropdown" role="button" aria-expanded="false">
                          {{ Auth::user()->name }} <span class="caret"></span> <!-- Displays the authenticated user's name -->
                      </a>

                      <ul class="dropdown-menu" role="menu">
                        <li><a href="/studenthub/public/dashboard">Dashboard</a></li>

                        @if(Auth::user()->hasRole("Admin"))
                            <li><a href="/studenthub/public/admin">Admin Panel</a></li>
                        @endif

                        @if(Auth::user()->hasRole("Teacher"))
                            <li><a href="/studenthub/public/assignments/create">Set Assignment</a></li>
                        @endif


                        <li><a href="/studenthub/public/add_subject">Add Subjects</a></li>

                          <li>
                              <a href="{{ route('logout') }}"
                                  onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                                  Logout
                              </a>

                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  {{ csrf_field() }}
                              </form>
                          </li>
                      </ul>
                  </li>
              @endif
          </ul>
      </div>
  </div>
</nav>

