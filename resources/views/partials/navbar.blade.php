<nav class="navbar navbar-expand-lg sticky-top bg-white shadow-sm" style="direction: rtl;">
    <div class="container">
        <div class="d-flex align-items-center">
<a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
    <img src="{{ asset('images/HotelLogo.jpeg') }}" 
         alt="Logo" 
         class="me-2 rounded-circle" 
         style="width: 45px; height: 45px; object-fit: cover; border: 2px solid #198754;">
    
    <span class="fw-bold text-success" style="font-size: 1.2rem;">فندق مجد الضيافة</span>
</a>

            @guest
                <ul class="navbar-nav ms-3">
                    <li class="nav-item">
<a class="nav-link fw-bold text-dark" href="{{ route('login') }}">
    تسجيل الدخول / إنشاء حساب
</a>

                    </li>
                </ul>
            @endguest

            @auth
                <ul class="navbar-nav ms-3">
                    <li class="nav-item">
                        <span class="nav-link text-muted">مرحباً، {{ Auth::user()->name }}</span>
                    </li>
                </ul>
            @endauth
        </div>

        @auth
<form method="POST" action="{{ route('logout') }}" class="d-inline">
    @csrf
    <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill">
        <i class="fas fa-sign-out-alt"></i> تسجيل الخروج
    </button>
</form>
@endauth

@auth
    @if(auth()->user()->is_admin)
        <a href="{{ route('admin.dashboard') }}"
           class="btn btn-success btn-sm rounded-pill me-2">
            لوحة التحكم
        </a>
    @endif
@endauth



        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>


            <ul class="navbar-nav" id="nav-links-container">
                <li class="nav-item"><a class="nav-link" href="#home">الرئيسية</a></li>
                <li class="nav-item"><a class="nav-link" href="#about">من نحن</a></li>
                <li class="nav-item"><a class="nav-link" href="#services">خدماتنا</a></li>
                <li class="nav-item"><a class="nav-link" href="#vision">رؤيتنا</a></li>
                <li class="nav-item"><a class="nav-link" href="#location">موقعنا</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">تواصل معنا</a></li>
            </ul>
    </div>
</nav>
