<header class="main-header">
    <a href="{{ route('admin.dashboard') }}" class="logo">
        <img src="{{ asset('assets-admin/img/KYMS.png') }}" alt="KYMS Academy">
    </a>

    <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="pe-7s-angle-left-circle"></span>
        </a>

        <!-- searchbar-->
        <a href="#search"><span class="pe-7s-search"></span></a>
        <div id="search">
            <button type="button" class="close">×</button>
            <form>
                <input type="search" value="" placeholder="Search.." />
                <button type="submit" class="btn btn-add">Search...</button>
            </form>
        </div>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown dropdown-user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('assets-admin/img/avatar5.png') }}" class="img-circle" width="45" height="45" alt="user">
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <form action="{{ route('admin.logout') }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" style="background:none; border:none; width:100%; text-align:left; padding:10px 15px;">
                                    <i class="fa fa-sign-out"></i> Signout
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>

<aside class="main-sidebar">
    <div class="sidebar">
        <ul class="sidebar-menu">


            <li class="treeview">
                <a href="#">
                    <i class="fa fa-book"></i><span>Blogs</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/admin/blogs/create') }}"><i class="fa fa-plus"></i> Add Blogs</a></li>
                    <li><a href="{{ url('/admin/blogs') }}"><i class="fa fa-list"></i> Show Blogs</a></li>
                </ul>
            </li>
        </ul>
    </div>
</aside>