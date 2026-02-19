<nav class="navbar navbar-expand-lg sticky-top bg-white shadow-sm" style="direction: rtl;">
    <div class="container d-flex justify-content-between align-items-center">
        
        <a class="navbar-brand d-flex align-items-center m-0" href="{{ route('home') }}">
            <img src="{{ asset('images/Logo2.jpeg') }}" alt="Logo" class="ms-2 rounded-circle" style="width: 35px; height: 35px; object-fit: cover;">
            <span class="fw-bold text-success" style="font-size: 0.9rem;">فندق مجد الضيافة</span>
        </a>

        <div class="d-flex align-items-center gap-2">
            
            @auth
                <div class="dropdown">
                    <button class="btn btn-light btn-sm rounded-pill shadow-sm d-flex align-items-center gap-1 p-1 px-2" type="button" data-bs-toggle="dropdown">
                        <i class="fas fa-user-circle text-success fs-5"></i>
                        <span class="small d-none d-md-inline">حسابي</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end text-end shadow border-0 mt-2">
                        <li><span class="dropdown-item-text small fw-bold text-muted border-bottom pb-2">مرحباً، {{ Auth::user()->name }}</span></li>
                        @if(auth()->user()->is_admin)
                            <li><a class="dropdown-item small py-2" href="{{ route('admin.dashboard') }}"><i class="fas fa-cog me-1"></i> لوحة التحكم</a></li>
                        @endif
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger small py-2"><i class="fas fa-sign-out-alt me-1"></i> تسجيل الخروج</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @endauth

            @guest
                <a href="{{ route('login') }}" class="btn btn-outline-success btn-sm rounded-pill px-3 small">دخول</a>
            @endguest

            <button class="navbar-toggler border-0 p-1" type="button" data-bs-toggle="collapse" data-bs-target="#navLinksMenu">
                <i class="fas fa-bars text-dark fs-4"></i>
            </button>
        </div>

        <div class="collapse navbar-collapse" id="navLinksMenu">
            <ul class="navbar-nav ms-auto text-center mt-3 mt-lg-0 border-top border-lg-0 pt-2 pt-lg-0">
                <li class="nav-item"><a class="nav-link py-2 fw-medium" href="#home">الرئيسية</a></li>
                <li class="nav-item"><a class="nav-link py-2 fw-medium" href="#about">من نحن</a></li>
                <li class="nav-item"><a class="nav-link py-2 fw-medium" href="#services">خدماتنا</a></li>
                <li class="nav-item"><a class="nav-link py-2 fw-medium" href="#vision">رؤيتنا</a></li>
                <li class="nav-item"><a class="nav-link py-2 fw-medium" href="#location">موقعنا</a></li>
                <li class="nav-item"><a class="nav-link py-2 text-success fw-bold" href="#contact">تواصل معنا</a></li>
            </ul>
        </div>

    </div>
</nav>