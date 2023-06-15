<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4 ">
    <div class="brand-link d-flex justify-content-between align-items-center">
        <a class="brand-link" href="{{ route('home') }}">
          <span class="brand-text font-weight-light">OFSPTS</span>
        </a>
    </div>

  
    <!-- Sidebar -->
    <div class="sidebar">
  
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">
            <a href="#" class="nav-link ">
                <i class="fa-solid fa-folder nav-icon"></i>
                <p>
                Permits
                <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                {{-- if business owner --}}
                @if (auth()->user()->user_type == 2)
                <li class="nav-item">
                    <a href="#" class="nav-link ">
                      <i class="fa-solid fa-upload nav-icon"></i>
                        <p>Submit Application</p>
                    </a>
                </li>
                {{-- if business owner --}}
                <li class="nav-item">
                    <a href="#" class="nav-link ">
                        <i class="fa-solid fa-file-contract nav-icon"></i>
                        <p>My Applications</p>
                    </a>
                </li>
                @endif
                {{-- if admin --}}
                @if (auth()->user()->user_type == 1)
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa-solid fa-file-contract nav-icon"></i>
                        <p>Applications</p>
                    </a>
                </li>
                @endif
            </ul>
        </li>

          {{-- if admin --}}
          @if (auth()->user()->user_type == 1)
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>Butterfly List</p>
            </a>
          </li>
          @endif
          <li class="nav-item">
            <a href="{{ route('auth.logout') }}" class="nav-link">
              <i class="fa-solid fa-right-from-bracket nav-icon"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>