<nav class="mt-2">
   <ul class="nav nav-pills nav-sidebar flex-column">
    <li class="nav-item">
      <a href="{{route('admin.home')}}" class="nav-link {{request()->is('admin') ? 'active' : ''}}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
          Admin
        </p>
      </a>
    </li>
   </ul>

    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
      <li class="nav-item menu-open">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-book"></i>
          <p>
            Opciones de Posts
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview {{request()->is('admin/posts*')}}">         
          <li class="nav-item">
            <a href="{{route('admin.posts.index')}}" class="nav-link {{request()->is('admin/posts') ? 'active' : ''}}">
                <i class="nav-icon fas fa-list"></i>
                <p>
                  Listado de posts
                </p>
              </a>

              <a href="{{route('admin.posts.create')}}" class="nav-link {{request()->is('admin/posts/create') ? 'active' : ''}}">
                <i class="nav-icon fas fa-pencil-alt"></i>
                <p>
                  Crear post
                </p>
              </a>
          </li>
        </ul>
      </li>     
    </ul>
  </nav>