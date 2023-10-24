<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link" href="index.html">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>
            <div class="sb-sidenav-menu-heading">Interface</div>
            {{-- category --}}
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Category
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{ url('admin/category') }}">View Cateory</a>
                    <a class="nav-link" href="{{ url('admin/category/create') }}">Add Category</a>
                </nav>
            </div>
            {{-- add Product --}}
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                Main Product
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                        Product
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{ url('admin/product') }}">View Product</a>
                            <a class="nav-link" href="{{ url('admin/product/create') }}">Add Product</a>                        </nav>
                    </div>
                </nav>
            </div>
            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{ url('admin/category') }}">View Product</a>
                    <a class="nav-link" href="{{ url('admin/category/create') }}">Add Poduct</a>
                </nav>
            </div>
            {{-- Brand sidebar --}}
            <a class="nav-link" href="{{ url('admin/brands') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                Brand
            </a>
            <a class="nav-link" href="{{ url('admin/colors') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                Color
            </a>
            <a class="nav-link" href="{{ url('admin/slider') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                Slider
            </a>
            {{--  --}}
        </div>
    </div>

</nav>
