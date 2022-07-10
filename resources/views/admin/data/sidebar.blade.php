<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item  @yield('dashboard')">
        <a class="nav-link" href="/panel">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item @yield('category')">
        <a class="nav-link" href="{{route('category.list')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Categories</span></a>
    </li>

    <li class="nav-item @yield('brand')">
        <a class="nav-link" href="{{route('brand.list')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Brands</span></a>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item @yield('products')">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
           aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Products</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
             data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Product Screens::</h6>
                <a class="collapse-item @yield('products_mng')" href="{{route('products.list')}}">Manage Products</a>
                <a class="collapse-item @yield('add_products')" href="{{route('products.add')}}">Add Products</a>
            </div>
        </div>
    </li>
    <li class="nav-item @yield('cupon')">
        <a class="nav-link" href="{{route('cupon.mng')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Cupons</span></a>
    </li>
    <li class="nav-item @yield('category')">
        <a class="nav-link" href="{{route('order')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Orders</span></a>
    </li>
    <li class="nav-item @yield('blog')">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Blog</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Blog Screens:</h6>
                <a class="collapse-item @yield('articles_mng')" href="{{route('articles')}}">Manage Articles</a>
                <a class="collapse-item @yield('add_articles')" href="{{route('articles.add')}}">Add Articles</a>
            </div>
        </div>
    </li>

    <li class="nav-item @yield('contact')">
        <a class="nav-link" href="{{route('user.messages')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>User Messages</span></a>
    </li>

    <li class="nav-item @yield('reviews')">
        <a class="nav-link" href="{{route('reviews.ratings')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Reviews & Ratings</span></a>
    </li>


    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
