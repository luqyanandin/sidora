<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
      
      <li class="nav-item">
        <a href="/dashboard" class="nav-link {{request()->is('dashboard')?'active':''}}">
          <img src="{{ asset('template') }}/dist/img/dashboard.png" width="20px">
          {{-- <i class="nav-icon fas fa-tachometer-alt"></i> --}}
          <p>
            Dashboard
            <!-- <span class="right badge badge-danger">New</span> -->
          </p>
        </a>
      </li>

      <li class="nav-item">
            <a href="/login" class="nav-link {{request()->is('login')?'active':''}}">
              <img src="{{ asset('template') }}/dist/img/akun.png" width="20px"> 
              {{-- <i class="nav-icon fas fa-tachometer-alt"></i> --}}
              <p>
                Login
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>

    </ul>
  </nav>