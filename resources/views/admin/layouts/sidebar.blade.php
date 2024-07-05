<div class="navbar-bg"></div>


{{-- Navbar Start --}}

@include('admin.layouts.navbar')

{{-- Navbar End --}}

<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin.dashboard') }}">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="active">
                <a href="{{ route('admin.dashboard') }}" class="nav-link"><i
                        class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Starter</li>
            {{-- <li><a class="nav-link" href="{{ route('admin.category.index') }}"><i class="fas fa-cogs"></i>
                    <span>Category</span></a></li> --}}

            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-language"></i>
                    <span>Language</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.language.create') }}">Add Language</a></li>
                    <li><a class="nav-link" href="{{ route('admin.language.index') }}">Manage Language</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-cogs"></i>
                    <span>Category</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.category.create') }}">Add Category</a></li>
                    <li><a class="nav-link" href="{{ route('admin.category.index') }}">Manage Category</a></li>
                </ul>
            </li>



            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-file-alt"></i>
                    <span>News</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('admin.news.create') }}">Create News</a></li>
                    <li><a class="nav-link" href="{{ route('admin.news.index') }}">Manage News</a></li>
                </ul>
            </li>


        </ul>
    </aside>
</div>
