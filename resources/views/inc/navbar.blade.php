<header>
    @if($userzone = auth()->user()->type == 1)
        <nav class="gradient-bg">
            <div class="container">
                <div class="nav-wrapper">
                    <a href="{{route('dashboard')}}" class="brand-logo hide-on-small-only">ระบบจัดการพนักงาน</a>
                    <a href="{{route('dashboard')}}" class="brand-logo show-on-small-only hide-on-med-and-up">EMS</a>
                    <ul>
                        <a href="#" data-target="slide-out" class="sidenav-trigger"><i
                                    class="material-icons white-text">menu</i></a>
                    </ul>
                    <ul class="right">
                        <li>
                            <a class="dropdown-trigger" href="#!" data-target="dropdown1">
                                {{ Auth::user()->username }}
                                <i class="material-icons right white-text">arrow_drop_down</i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    @elseif($userzone = auth()->user()->type == 99)
        <style>
            .gradient-bg {
                background: #536976;  /* fallback for old browsers */
                background: -webkit-linear-gradient(to right, #292E49, #536976);  /* Chrome 10-25, Safari 5.1-6 */
                background: linear-gradient(to right, #292E49, #536976); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            }
            .background {
                background: #536976;  /* fallback for old browsers */
                background: -webkit-linear-gradient(to right, #292E49, #536976);  /* Chrome 10-25, Safari 5.1-6 */
                background: linear-gradient(to right, #292E49, #536976); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            }
        </style>
        <nav class="gradient-bg">
            <div class="container">
                <div class="nav-wrapper">
                    <a href="{{route('dashboard')}}" class="brand-logo hide-on-small-only">{{auth()->user()->first_name}} {{auth()->user()->last_name}}</a>
                    <a href="{{route('dashboard')}}" class="brand-logo show-on-small-only hide-on-med-and-up"></a>
                    <ul>
                        <a href="#" data-target="slide-out" class="sidenav-trigger"><i
                                    class="material-icons white-text">menu</i></a>
                    </ul>
                    <ul class="right">
                        <li>
                            <a class="dropdown-trigger" href="#!" data-target="dropdown1">
                                {{ Auth::user()->username }}
                                <i class="material-icons right white-text">arrow_drop_down</i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    @endif
</header>
<!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content">
    <li><a href="{{route('auth.show')}}">โปรไฟล์</a></li>
    <li class="divider"></li>
    <li><a href="{{ route('auth.logout') }}">ออกจากระบบ</a></li>
</ul>
@include('inc.sidenav')