 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('public/admin/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="{{url('admin/dashboard')}}" class="nav-link {{ Request::is('admin/dashboard')?'active':'' }}">
              <i class="fas fa-tachometer-alt fa-sm"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="{{route('category.index')}}" class="nav-link {{ Request::is('admin/category*')?'active':'' }}">
              <i class="fas fa-tags fa-sm"></i>
              <p>
                Categories
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="{{route('tags.index')}}" class="nav-link {{ Request::is('admin/tags*')?'active':'' }}">
              <i class="fas fa-tag fa-sm"></i>
              <p>
                Tags
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="{{route('posts.index')}}" class="nav-link {{ Request::is('admin/posts*')?'active':'' }}">
              <i class="fas fa-thumbtack fa-sm"></i>
              <p>
                Post
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="{{route('contact.us')}}" class="nav-link {{ Request::is('admin/contact/list')?'active':'' }}">
              <i class=" fa fa-envelope fa-sm"></i>
              <p>
                Message
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="{{route('user.index')}}" class="nav-link {{ Request::is('admin/user*')?'active':'' }}">
              <i class="fas fa-user fa-sm"></i>
              <p>
                User
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="{{route('setting.index')}}" class="nav-link {{ Request::is('admin/setting')?'active':'' }}">
              <i class=" fa fa-cog fa-sm"></i>
              <p>
                Setting
              </p>
            </a>
          </li>

          <li class="nav-header">Your Account</li>

          <li class="nav-item has-treeview">
            <a href="{{route('profile')}}" class="nav-link {{ Request::is('admin/profile*')?'active':'' }}">
              <i class="far fa-user fa-sm"></i>
              <p>
                Your Profile
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();" class="nav-link">
              <i class=" fa fa-sign-out-alt fa-sm"></i>
              <p>
                Logout
              </p>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

          </li>


          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fas fa-edit fa-sm"></i>
              <p>
                Forms
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/forms/general.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>General Elements</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/forms/advanced.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Advanced Elements</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/forms/editors.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Editors</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/forms/validation.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Validation</p>
                </a>
              </li>
            </ul>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>