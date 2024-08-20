<div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{asset("/template/dist/img/user9.jpg")}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        @auth
        <a href="/profile" class="d-block">{{Auth::user()->name}}</a>
        @endauth
        @guest
        <a href="/register" class="d-block">Guest</a>    
        @endguest
        
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="/welcome" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/kategori" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Category
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/pertanyaan" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Question
            </p>
          </a>
        </li>
          {{-- Detail dan Edit Profile --}}
          @auth
          <li class="nav-item">
            <a href="/profile" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Profile
              </p>
            </a>
          </li>
          {{-- Log Out --}}
          <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link bg-danger" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
              <p>
                Logout
              </p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>  
          </li>
          @endauth
          {{-- Log In --}}
          @guest
          <li class="nav-item">
            <a href="/login" class="nav-link bg-info">
              <p>
                Login
              </p>
            </a>
          </li>
          @endguest
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>