<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة تحكم الأدمن</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a2e0b1b4d1.js" crossorigin="anonymous"></script>
</head>
<body style="background: #f5f5f5;">

<!-- شريط العلوي -->
<nav class="navbar navbar-expand-lg sticky-top bg-white shadow-sm" style="direction: rtl;">
    <div class="container">
        <div class="d-flex align-items-center">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
                <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-2"
                     style="width:40px;height:40px;">GA</div>
                <span class="fw-bold text-success">فندق مجد الضيافة</span>
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

        <div class="d-flex align-items-center">
            @auth
                <form method="POST" action="{{ route('logout') }}" class="d-inline me-2">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill">
                        <i class="fas fa-sign-out-alt"></i> تسجيل الخروج
                    </button>
                </form>

                @if(auth()->user()->is_admin)
                    <a href="{{ route('admin.dashboard') }}"
                       class="btn btn-success btn-sm rounded-pill me-2">
                        لوحة التحكم
                    </a>
                @endif
            @endauth
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- روابط الموقع العادية (يمكن إخفاؤها للأدمن إذا أردت) -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav" id="nav-links-container">
                <li class="nav-item"><a class="nav-link" href="#home">الرئيسية</a></li>
                <li class="nav-item"><a class="nav-link" href="#about">من نحن</a></li>
                <li class="nav-item"><a class="nav-link" href="#services">خدماتنا</a></li>
                <li class="nav-item"><a class="nav-link" href="#vision">رؤيتنا</a></li>
                <li class="nav-item"><a class="nav-link" href="#location">موقعنا</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">تواصل معنا</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- نهاية الشريط العلوي -->

<!-- محتوى الصفحة -->
<div class="container py-5">
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
