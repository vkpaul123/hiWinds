<header class="main-header">
  <!-- Logo -->
  <a href="/" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini">H<b>W</b></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg">High<b>Winds</b></span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            @isset(Auth::user()->photo)
              <img src="{{ Auth::user()->photo }}" class="user-image" alt="User Image">
            @else
              <img src="{{ asset('rawThemes/staticImages/user.png') }}" class="user-image" alt="User Image">
            @endisset

            <span class="hidden-xs">{{ @Auth::user()->firstname." ".@Auth::user()->middlename." ".@Auth::user()->lastname }}</span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              @isset(Auth::user()->photo)
                <img src="{{ Auth::user()->photo }}" class="img-circle" alt="User Image">
              @else
                <img src="{{ asset('rawThemes/staticImages/user.png') }}" class="img-circle" alt="User Image">
              @endisset

              <p>
                {{ @Auth::user()->firstname." ".@Auth::user()->middlename." ".@Auth::user()->lastname }} - <strong>{{ @Auth::user()->companyname }}</strong>
                <small>Member since {{ @Auth::user()->created_at->diffForHumans() }}</small>
              </p>
            </li>
            <!-- Menu Body -->
            <li class="user-body">
              <div class="row">
                <div class="col-xs-4 text-center">
                  <a href="#">Followers</a>
                </div>
                <div class="col-xs-4 text-center">
                  <a href="#">Sales</a>
                </div>
                <div class="col-xs-4 text-center">
                  <a href="#">Friends</a>
                </div>
              </div>
              <!-- /.row -->
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="{{ route('user.viewProfile') }}" class="btn btn-default btn-flat">Profile</a>
              </div>
              <div class="pull-right">
                <a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"
                class="btn btn-default btn-flat">Sign out</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
                </form>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>