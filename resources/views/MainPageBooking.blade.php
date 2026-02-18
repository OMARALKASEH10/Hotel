<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>فندق الغد الأفضل | للضيافة الفاخرة</title>

    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary-green: #1a9e52;
            --dark-blue: #1c2e36;
            --light-bg: #f8f9fa;
        }

        body {
            font-family: 'Tajawal', sans-serif;
            scroll-behavior: smooth;
            transition: background-color .3s, color .3s;
        }

        /* ===== Top Bar ===== */
/* الوضع المضيء */
body:not(.dark-mode) .top-bar {
    background-color: #1c2e36;
    color: #ffffff;
}

/* الوضع المظلم */
body.dark-mode .top-bar {
    background-color: #000000;
    border-bottom: 1px solid #333;
}


        .top-bar a,
        .top-bar i {
            color: #fff;
            transition: .3s;
            cursor: pointer;
        }

        .top-bar a:hover,
        .top-bar i:hover {
            color: var(--primary-green);
        }

        .top-bar-item {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* ===== Dark Mode ===== */
        body.dark-mode {
            background: #121212;
            color: #fff;
        }

        body.dark-mode .bg-white {
            background: #1e1e1e !important;
            color: #fff;
        }

        body.dark-mode .nav-link,
        body.dark-mode h2,
        body.dark-mode h3 {
            color: #fff !important;
        }

        /* ===== Hero ===== */
        .hero {
            height: 80vh;
            background: linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.5)),
            url('https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            color: #fff;
        }

        

        .btn-primary-custom {
            background: var(--primary-green);
            border: none;
            padding: 12px 35px;
            border-radius: 50px;
            transition: .3s;
        }

        .btn-primary-custom:hover {
            background: #148041;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(26,158,82,.4);
        }

        .navbar-brand span {
            color: var(--primary-green);
            font-weight: 700;
        }

        .section-padding {
            padding: 80px 0;
        }
    </style>
</head>

<div class="modal fade" id="loginModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4">
            <div class="modal-header">
                <h5 class="modal-title">تسجيل الدخول</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <input type="email" class="form-control mb-3" placeholder="البريد الإلكتروني">
                <input type="password" class="form-control mb-3" placeholder="كلمة المرور">
                <button class="btn btn-primary-custom text-white w-100">دخول</button>
            </div>
        </div>
    </div>
</div>

<body>

    

<!-- ===== Top Bar ===== -->
<div class="top-bar d-none d-md-block">
    <div class="container d-flex justify-content-between align-items-center">

        <div class="d-flex align-items-center gap-4">
            <a href="https://www.facebook.com/omar.alkaseh.2025" target="_blank">
                <i class="fab fa-facebook-f"></i>
            </a>

            <div class="top-bar-item">
                <span>52 22 400 91 218+</span>
                <i class="fas fa-phone-alt" style="transform: scaleX(-1);"></i>
            </div>

            <div class="top-bar-item">
                <span>EN</span>
                <i class="fas fa-globe"></i>
            </div>

            <div class="top-bar-item" onclick="toggleDarkMode()" title="الوضع الليلي">
                <i class="fas fa-moon" id="mode-icon"></i>
            </div>
        </div>

        <div class="d-flex align-items-center gap-4">
            <div class="top-bar-item">
                <span>السبت - الخميس : 09:00 AM - 12:00 AM</span>
                <i class="far fa-clock"></i>
            </div>
            <div class="top-bar-item">
                <span>ليبيا</span>
                <i class="fas fa-map-marker-alt"></i>
            </div>
        </div>

    </div>
</div>


<!-- ===== Navbar ===== -->
<nav class="navbar navbar-expand-lg sticky-top bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-2"
                 style="width:40px;height:40px;">GA</div>
            <span>فندق الغد الأفضل</span>
        </a>

        <li class="nav-item">
    <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#loginModal">
        تسجيل الدخول
    </a>
</li>


        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link active" href="#home">الرئيسية</a></li>
                <li class="nav-item"><a class="nav-link" href="#about">من نحن</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">اتصل بنا</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- ===== Hero ===== -->
<header class="hero" id="home">
    <div class="container">
        <div class="col-lg-6 animate__animated animate__fadeInRight">
            <h1 class="display-3 fw-bold mb-4">تجربة فندقية تفوق التوقعات</h1>
            <p class="lead mb-5">
                بخبرتنا الواسعة في عالم الضيافة، نقدم أقصى درجات الراحة والرفاهية.
            </p>
            <a href="#contact" class="btn btn-primary-custom text-white fw-bold">احجز الآن</a>
        </div>
    </div>
</header>

<section class="section-padding text-center text-white"
         style="background: linear-gradient(135deg,#1a9e52,#148041);">
    <div class="container">
        <h2 class="fw-bold mb-3 animate__animated animate__pulse animate__infinite">
            🎉 سحب خاص بمناسبة الإفتتاح 🎉
        </h2>
        <p class="lead mb-4">
            اشترك الآن وادخل السحب للفوز بإقامة مجانية لمدة <strong>3 ليالي</strong>
        </p>
        <a href="#contact" class="btn btn-light btn-lg fw-bold rounded-pill">
            شارك الآن
        </a>
    </div>
</section>


<section id="contact" class="section-padding" style="background: var(--light-bg);">
    <div class="container">
        <div class="row g-5">

            <!-- Form -->
            <div class="col-lg-6">
                <div class="bg-white p-5 rounded-4 shadow-sm">
                    <h2 class="fw-bold mb-4">تواصل معنا</h2>
                    <form>
                        <div class="mb-3">
                            <input type="text" class="form-control form-control-lg" placeholder="الاسم الكامل" required>
                        </div>
                        <div class="mb-3">
                            <input type="tel" class="form-control form-control-lg" placeholder="رقم الهاتف" required>
                        </div>
                        <div class="mb-3">
                            <textarea class="form-control form-control-lg" rows="4" placeholder="الموضوع" required></textarea>
                        </div>
                        <button class="btn btn-primary-custom text-white w-100">إرسال</button>
                    </form>
                </div>
            </div>

            <!-- Map -->
            <div class="col-lg-6">
                <div class="bg-white p-4 rounded-4 shadow-sm h-100">
                    <h4 class="fw-bold mb-3">📍 موقعنا</h4>
                    <iframe
                        src="https://www.google.com/maps?q=Tripoli,Libya&output=embed"
                        width="100%" height="250" style="border:0;" loading="lazy">
                    </iframe>
                    <a href="https://www.google.com/maps?q=Tripoli,Libya"
                       target="_blank"
                       class="btn btn-outline-success w-100 mt-3">
                        فتح الموقع في خرائط جوجل
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- ===== Footer ===== -->
<footer class="bg-dark text-white py-4 text-center">
    <p class="mb-0 small">© جميع الحقوق محفوظة | فندق الغد الأفضل</p>
</footer>

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    function toggleDarkMode() {
        document.body.classList.toggle('dark-mode');
        const icon = document.getElementById('mode-icon');
        icon.classList.toggle('fa-sun');
        icon.classList.toggle('fa-moon');
    }

    const navLinks = document.querySelectorAll('.nav-link');
    const menuToggle = document.getElementById('navbarNav');
    const bsCollapse = new bootstrap.Collapse(menuToggle, { toggle: false });

    navLinks.forEach(link => {
        link.addEventListener('click', () => {
            if (window.innerWidth < 992) bsCollapse.hide();
        });
    });
</script>

</body>
</html>
