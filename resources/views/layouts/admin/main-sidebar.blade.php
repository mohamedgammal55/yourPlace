<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="side-header">
        <a class="header-brand1" href="{{route('home')}}">
            <img src="{{asset('site/img/logos/black-logo.png')}}" class="header-brand-img light-logo1" alt="logo">
        </a>
        <!-- LOGO -->
    </div>
    <ul class="side-menu">
        <li><h3>elements</h3></li>
        <li class="slide">
            <a class="side-menu__item" href="{{route('home')}}">
                <i class="icon icon-home side-menu__icon"></i>
                <span class="side-menu__label">Home</span>
            </a>
        </li>
        @if(loggedAdmin('role') == 'admin')
            <li class="slide">
                <a class="side-menu__item" href="{{route('admin.index')}}">
                    <i class="fe fe-users side-menu__icon"></i>
                    <span class="side-menu__label">Admins</span>
                </a>
            </li>
            <li class="slide">
                <a class="side-menu__item" href="{{route('company.index')}}">
                    <i class="fe fe-user-plus side-menu__icon"></i>
                    <span class="side-menu__label">Companies</span>
                </a>
            </li>
        @endif

        <li class="slide">
            <a class="side-menu__item" href="{{route('categories.index')}}">
                <i class="fe fe-bold side-menu__icon"></i>
                <span class="side-menu__label">Categories and Models</span>
            </a>
        </li>

        <li class="slide">
            <a class="side-menu__item" href="{{route('cars.index')}}">
                <i class="fe fe-truck side-menu__icon"></i>
                <span class="side-menu__label">Vehicles</span>
            </a>
        </li>
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#">
                <i class="fe fe-dollar-sign side-menu__icon"></i>
                <span class="side-menu__label">Reservations</span><i class="angle fa fa-angle-right"></i>
            </a>
            <ul class="slide-menu">
                <li><a href="{{route('siteReservations.index')}}?status=new" class="slide-item">New Reservations</a></li>
                <li><a href="{{route('siteReservations.index')}}?status=old" class="slide-item">Old Reservations</a></li>
            </ul>
        </li>
        @if(loggedAdmin('role') == 'admin')




            <li class="slide">
                <a class="side-menu__item" href="{{route('city.index')}}">
                    <i class="fe fe-map side-menu__icon"></i>
                    <span class="side-menu__label">Cities List</span>
                </a>
            </li>

            <li class="slide">
                <a class="side-menu__item" data-toggle="slide" href="#">
                    <i class="fe fe-info side-menu__icon"></i>
                    <span class="side-menu__label">About us Page</span><i class="angle fa fa-angle-right"></i>
                </a>
                <ul class="slide-menu">
                    <li><a href="{{route('about.index')}}" class="slide-item">Change Content</a></li>
                    <li><a href="{{route('brands.index')}}" class="slide-item">Partners</a></li>
                </ul>
            </li>

            <li class="slide">
                <a class="side-menu__item" href="{{route('posts.index')}}">
                    <i class="fe fe-file-text side-menu__icon"></i>
                    <span class="side-menu__label">Posts And News</span>
                </a>
            </li>

            <li class="slide">
                <a class="side-menu__item" href="{{route('team.index')}}">
                    <i class="fe fe-user-plus side-menu__icon"></i>
                    <span class="side-menu__label">Team Work</span>
                </a>
            </li>

            <li class="slide">
                <a class="side-menu__item" href="{{route('users.index')}}">
                    <i class="fe fe-users side-menu__icon"></i>
                    <span class="side-menu__label">Users</span>
                </a>
            </li>

            <li class="slide">
                <a class="side-menu__item" href="{{route('contact.index')}}">
                    <i class="fe fe-mail side-menu__icon"></i>
                    <span class="side-menu__label">User Contacts</span>
                </a>
            </li>
        @endif

        <li class="slide">
            <a class="side-menu__item" href="{{route('log-out')}}">
                <i class="icon icon-lock side-menu__icon"></i>
                <span class="side-menu__label">Logout</span>
            </a>
        </li>

    </ul>
</aside>
