<footer class="pt-5 pb-4" style="background: #1c2e36; color: #fff;">
    <div class="container">
        <div class="row gy-4 text-right">

            {{-- 1. قسم العنوان وتواصل معنا --}}
            <div class="col-md-4">
                <h5 class="fw-bold mb-4 border-bottom pb-2 d-inline-block">تواصل معنا</h5>
                <div class="contact-info">
                    <p class="small mb-3">
                        
                                    <div class="top-bar-item mt-3">
                                        <i class="fas fa-phone-alt ms-2 text-success"></i> 
                <span>{{ $phone }}</span>
            </div>
                    </p>
                    <p class="small mb-3">
                        <i class="fas fa-map-marker-alt ms-2 text-success"></i> 
                        طرابلس - دريبي شارع الرئيسي – ليبيا
                    </p>
                    <div class="social-icons mt-3">
                        <a href="https://www.facebook.com/omar.alkaseh.2025" target="_blank" class="facebook-link">
                           
                            <i class="fab fa-facebook-f"></i>
                             صفحتنا على الفيس
                        </a>
                    </div>
                </div>
            </div>

            {{-- 2. قسم روابط سريعة (التصميم الجديد) --}}
            <div class="col-md-4">
                <h5 class="fw-bold mb-4 border-bottom pb-2 d-inline-block">روابط سريعة</h5>
                <ul class="list-unstyled footer-links p-0">
                    <li><a href="#home"><i class="fas fa-chevron-left ms-2 small"></i> الرئيسية</a></li>
                    <li><a href="#about"><i class="fas fa-chevron-left ms-2 small"></i> من نحن</a></li>
                    <li><a href="#services"><i class="fas fa-chevron-left ms-2 small"></i> خدماتنا</a></li>
                    <li><a href="#vision"><i class="fas fa-chevron-left ms-2 small"></i> رؤيتنا</a></li>
                    <li><a href="#location"><i class="fas fa-chevron-left ms-2 small"></i> موقعنا</a></li>
                    <li><a href="#contact"><i class="fas fa-chevron-left ms-2 small"></i> اتصل بنا</a></li>
                </ul>
            </div>

            {{-- 3. نبذة عن الفندق --}}
            <div class="col-md-4">
                <h5 class="fw-bold mb-4 border-bottom pb-2 d-inline-block">فندق مجد الضيافة</h5>
                <p class="small text-light-50" style="line-height: 1.8;">
                    وجهتكم الأولى للإقامة المتميزة في قلب طرابلس، حيث نجمع بين الأصالة الليبية والخدمات الفندقية العالمية لتوفير أقصى درجات الراحة.
                </p>
            </div>

        </div>

        <hr class="border-secondary my-4">

        <div class="text-center small text-light-50">
            © {{ date('Y') }} فندق مجد الضيافة – جميع الحقوق محفوظة
        </div>
    </div>
</footer>