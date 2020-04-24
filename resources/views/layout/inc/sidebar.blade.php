<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand mt-4">
            <a href="{{route('home')}}"> <img src="{{ asset('assets/img/laravel.ico') }}" height="90px" width="80px" alt=""></a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{route('home')}}">Menu</a>
        </div>
        <ul class="sidebar-menu mt-5">
            <li class="menu-header">Dashboard</li>
            <li class="dropdown">
                <a href="{{ route('home') }}"><i
                        class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Menu</li>
           
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="fas fa-columns"></i> <span>Post</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{route('post.index')}}">Daftar Post</a></li>
                    <li><a class="nav-link" href="{{route('showdelete')}}">Trash Post</a></li>
                </ul>
            </li>
          @if (auth()->user()->type == 1)
          <li class="dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                    class="fas fa-columns"></i> <span>Kategori</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{route('kategori.index')}}">Daftar Kategori</a></li>
            </ul>
        </li> 
        <li class="dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                    class="fas fa-columns"></i> <span>Tag</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{ route('tag.index') }}">Daftar Tag</a></li>
            </ul>
        </li> 
          <li class="dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                    class="fas fa-columns"></i> <span>User</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{route('user.index')}}">Daftar User</a></li>
            </ul>
        </li>              
          @endif
          
    </aside>
</div>