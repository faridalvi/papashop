<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="#">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                {{--Mart--}}
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMart"
                   aria-expanded="false" aria-controls="collapseMart">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Mart
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseMart" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{route('mart.index')}}">Show All</a>
                        <a class="nav-link" href="{{route('mart.create')}}">Add</a>
                    </nav>
                </div>
                {{--Product--}}
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProduct"
                   aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Product
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseProduct" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{route('product.index')}}">Show All</a>
                        <a class="nav-link" href="{{route('product.create')}}">Add</a>
                    </nav>
                </div>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Start Bootstrap
        </div>
    </nav>
</div>
