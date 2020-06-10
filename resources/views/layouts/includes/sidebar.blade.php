<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="{{ route('home') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                {{--Mart--}}
                @if(Auth::user()->can('mart-list') || Auth::user()->can('mart-list'))
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMart"
                   aria-expanded="false" aria-controls="collapseMart">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Mart
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseMart" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        @can('mart-list')
                            <a class="nav-link" href="{{route('mart.index')}}">Show All</a>
                        @endcan
                        @can('mart-create')
                            <a class="nav-link" href="{{route('mart.create')}}">Add</a>
                        @endcan
                    </nav>
                </div>
                @endif
                {{--Product--}}
                @if(Auth::user()->can('product-list') || Auth::user()->can('product-list'))
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProduct"
                   aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Product
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseProduct" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        @can('product-list')
                        <a class="nav-link" href="{{route('product.index')}}">Show All</a>
                        @endcan
                        @can('product-create')
                        <a class="nav-link" href="{{route('product.create')}}">Add</a>
                        @endcan
                    </nav>
                </div>
                @endif
                {{--User--}}
                @if(Auth::user()->can('user-list') || Auth::user()->can('user-list'))
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#User"
                   aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Users
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="User" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        @can('user-list')
                            <a class="nav-link" href="{{route('users.index')}}">Show All</a>
                        @endcan
                        @can('user-create')
                            <a class="nav-link" href="{{route('users.create')}}">Add</a>
                        @endcan
                    </nav>
                </div>
                @endif
                {{--Roles--}}
                @if(Auth::user()->can('role-list') || Auth::user()->can('role-list'))
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Role"
                       aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Roles
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="Role" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            @can('role-list')
                                <a class="nav-link" href="{{route('roles.index')}}">Show All</a>
                            @endcan
                            @can('role-create')
                                <a class="nav-link" href="{{route('roles.create')}}">Add</a>
                            @endcan
                        </nav>
                    </div>
                @endif
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#customer"
                   aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Customers
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="customer" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{route('customer.index')}}">Show All</a>
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
