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
          @auth
          <li class="nav-item">
            <a href="/rapat" class="nav-link {{request()->is('rapat')?'active':''}}">
              <img src="{{ asset('template') }}/dist/img/google-docs.png" width="20px"> 
              {{-- <i class="nav-icon fas fa-document-alt"></i> --}}
              <p>
                Rapat
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          @if(auth()->user()->hak_akses=='Super Admin')
          <li class="nav-item">
            <a href="/akun" class="nav-link {{request()->is('akun')?'active':''}}">
              <img src="{{ asset('template') }}/dist/img/akun.png" width="20px"> 
              {{-- <i class="nav-icon fas fa-tachometer-alt"></i> --}}
              <p>
                Akun
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          @endif
          @endauth

          {{-- @guest
          <li class="nav-item">
            <a href="/login" class="nav-link {{request()->is('login')?'active':''}}">
              <img src="{{ asset('template') }}/dist/img/akun.png" width="20px"> 
              <p>
                Login
              </p>
            </a>
          </li>
          @endguest --}}

          {{-- <li class="nav-item">
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
            <button type="submit" class="btn btn-default btn-flat">Logout</button> 
            </form>
          </li> --}}
        </ul>
      </nav>