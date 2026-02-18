


<x-app-layout>


    




<header class="hero" id="home" style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('{{ asset('images/majd.jpg') }}'); background-size: cover; background-position: center; min-height: 70vh; display: flex; align-items: center;">
    <div class="container text-right text-white animate__animated animate__fadeIn">
        <h1 class="display-3 fw-bold mb-4">تجربة فندقية تفوق التوقعات</h1>
        <p class="lead mb-5">بخبرتنا الواسعة في عالم الضيافة، نقدم أقصى درجات الراحة والرفاهية.</p>

<a href="javascript:void(0)"
   onclick="openBooking()"
   class="btn btn-success btn-lg rounded-pill px-5 py-3 fw-bold shadow animate__animated animate__pulse animate__infinite">
   🏨 احجز الآن
</a>




<script>
function openBooking() {
    let isMobile = /Android|iPhone|iPad/i.test(navigator.userAgent);
    let phone = '{{ $phone }}';

    if (isMobile) {
        window.location.href = 'tel:+' + phone;
    } else {
        window.open('https://wa.me/' + phone + '?text=مرحباً، أرغب في حجز غرفة', '_blank');
    }
}

</script>

    </div>
</header>

<div style="height: 100px;"></div>

<section id="giveaway" class="giveaway-section">
    <div class="container">

        
<style>
    /* حاوية النموذج لتظهر كبطاقة احترافية */
    .giveaway-card {
        background: #ffffff;
        border-radius: 20px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        padding: 2.5rem;
        max-width: 450px;
        margin: auto;
        direction: rtl;
        border: 1px solid #f0f0f0;
    }

    /* تنسيق العناوين داخل البطاقة */
    .giveaway-header h2 {
        color: #10b981; /* اللون الأخضر الخاص بك */
        font-weight: 800;
        margin-bottom: 0.5rem;
    }

    /* تنسيق حقول الإدخال */
    .custom-input {
        border-radius: 12px !important;
        border: 2px solid #e5e7eb !important;
        padding: 12px 15px !important;
        transition: all 0.3s ease;
        text-align: right;
        background-color: #f9fafb;
    }

    .custom-input:focus {
        border-color: #10b981 !important;
        box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.1) !important;
        background-color: #fff;
    }

    /* زر الاشتراك الجذاب */
    .btn-gradient {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        border: none;
        color: white;
        padding: 14px;
        border-radius: 12px;
        font-weight: bold;
        font-size: 1.1rem;
        transition: transform 0.2s, box-shadow 0.2s;
        box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);
    }

    .btn-gradient:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(16, 185, 129, 0.4);
        color: #fff;
    }

    .btn-gradient:active {
        transform: translateY(0);
    }

    .input-label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #374151;
        font-size: 0.9rem;
    }
</style>


<style>
    /* تنسيق قسم السحب بالكامل */

    /* بطاقة السحب الموحدة */
    .giveaway-card {
        background: #ffffff;
        border-radius: 24px;
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.2);
        padding: 3rem;
        max-width: 500px;
        margin: auto;
        direction: rtl;
        border: none;
    }

    /* تنسيق العداد داخل البطاقة */
    .card-countdown {
        background: #f0fdf4;
        border-radius: 15px;
        padding: 15px;
        margin-bottom: 25px;
        border: 1px dashed #10b981;
    }

    .card-countdown span {
        color: #111827;
        font-size: 1.2rem;
    }

    .custom-input {
        border-radius: 12px !important;
        border: 2px solid #e5e7eb !important;
        padding: 12px 15px !important;
        background-color: #f9fafb;
    }

    .custom-input:focus {
        border-color: #10b981 !important;
        box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.1) !important;
    }

    .btn-gradient:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(16, 185, 129, 0.3);
    }

    html {
    scroll-behavior: smooth;
}

</style>
@php
    $activeCampaigns = $campaigns->filter(function($campaign) {
        return !$campaign->draw_done && \Carbon\Carbon::now()->lt($campaign->end_date);
    });
@endphp

@if($activeCampaigns->count())
<section id="giveaway" class="giveaway-section">
    <div class="container">
        @foreach($activeCampaigns as $campaign)
            <div class="giveaway-card text-center mb-5 animate__animated animate__fadeInUp">
                <div class="giveaway-header mb-3">
                    <h2 class="mb-2">✨ {{ $campaign->name }} ✨</h2>
                    <p class="text-muted">{{ $campaign->description }}</p>
                </div>

                <div class="card-countdown h4 fw-bold mb-4">
                    <div id="timer-box-{{ $campaign->id }}">
                        <span id="days-{{ $campaign->id }}">0</span> يوم - 
                        <span id="hours-{{ $campaign->id }}">0</span> ساعة - 
                        <span id="minutes-{{ $campaign->id }}">0</span> دقيقة - 
                        <span id="seconds-{{ $campaign->id }}">0</span> ثانية
                    </div>
                </div>

                <form id="giveawayForm-{{ $campaign->id }}" method="POST" action="{{ route('giveaway.store') }}">
                    @csrf
                    <input type="hidden" name="campaign_id" value="{{ $campaign->id }}">

                    <div class="mb-3 text-right">
                        <label class="small fw-bold text-secondary mb-1">الاسم الثلاثي</label>
                        <input type="text" name="name" class="form-control custom-input text-right" placeholder="أدخل اسمك الكامل" required>
                    </div>

                    <div class="mb-4 text-right">
                        <label class="small fw-bold text-secondary mb-1">رقم الهاتف</label>
                        <input type="text" name="phone" class="form-control custom-input text-right" placeholder="09XXXXXXXX" required maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                    </div>

                    <button type="submit" class="btn btn-gradient w-100 shadow-sm">
                        🎉 تأكيد الاشتراك في السحب
                    </button>
                </form>

                <div class="mt-4">
                    <small class="text-muted">شروط المسابقة: تسجيل واحد لكل شخص عبر رقم الهاتف.</small>
                </div>
            </div>
        @endforeach
    </div>
</section>
@endif


      



<script>
document.addEventListener('DOMContentLoaded', () => {

    @foreach($campaigns as $campaign)
    $('#giveawayForm-{{ $campaign->id }}').on('submit', function(e) {
        e.preventDefault(); // منع إعادة تحميل الصفحة

        let form = $(this);
        let url = form.attr('action');
        let data = form.serialize();

        $.ajax({
            url: url,
            method: 'POST',
            data: data,
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'تم التسجيل بنجاح!',
                    text: response.message || '🎉 تم تسجيلك في السحب!',
                    confirmButtonColor: '#10b981'
                });

                // مسح الحقول بعد التسجيل
                form.trigger("reset");
            },
            error: function(xhr) {
                let errors = xhr.responseJSON.errors;
                let errorMessages = '';

                if (errors) {
                    Object.values(errors).forEach(function(arr){
                        arr.forEach(function(msg){
                            errorMessages += msg + '\n';
                        });
                    });
                } else {
                    errorMessages = xhr.responseJSON.message || 'حدث خطأ، حاول مرة أخرى.';
                }

                Swal.fire({
                    icon: 'error',
                    title: 'خطأ!',
                    text: errorMessages,
                    confirmButtonColor: '#d33'
                });
            }
        });
    });
    @endforeach

});
</script>




{{-- باقي الأقسام (About, Services, etc.) تتبع هنا بنفس ترتيبك --}}


{{-- ملفات JavaScript المطلوبة --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener('DOMContentLoaded', () => {

    @foreach($campaigns as $campaign)
    const endDate_{{ $campaign->id }} = new Date("{{ $campaign->end_date }}").getTime();

    const timer_{{ $campaign->id }} = setInterval(() => {
        const now = new Date().getTime();
        const diff = endDate_{{ $campaign->id }} - now;

        if (diff <= 0) {
            clearInterval(timer_{{ $campaign->id }});
            document.getElementById("timer-box-{{ $campaign->id }}").innerHTML = "<span class='text-danger'>⏰ انتهت فترة الاشتراك!</span>";
            document.getElementById("giveawayForm-{{ $campaign->id }}").style.opacity = "0.5";
            document.getElementById("giveawayForm-{{ $campaign->id }}").style.pointerEvents = "none";
            return;
        }

        document.getElementById("days-{{ $campaign->id }}").innerText = Math.floor(diff / (1000 * 60 * 60 * 24));
        document.getElementById("hours-{{ $campaign->id }}").innerText = Math.floor((diff / (1000 * 60 * 60)) % 24);
        document.getElementById("minutes-{{ $campaign->id }}").innerText = Math.floor((diff / (1000 * 60)) % 60);
        document.getElementById("seconds-{{ $campaign->id }}").innerText = Math.floor((diff / 1000) % 60);
    }, 1000);
    @endforeach

});
</script>



    </div>
    
</section>


<section id="about" class="py-5" style="background: linear-gradient(135deg, #e0f7fa, #ffffff);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0 animate__animated animate__fadeInLeft">
<img src="{{ asset('images/HowUs.jpeg') }}"
     class="img-fluid rounded-4 shadow-lg animate__animated animate__zoomIn w-75"
     alt="فندق مجد الضيافة">


            </div>
            <div class="col-lg-6 animate__animated animate__fadeInRight">
                <h2 class="fw-bold mb-3 text-success">من نحن</h2>
                <p class="lead">فندق مجد الضيافة، وجهتكم الأولى للإقامة المتميزة في قلب طرابلس، مع تجربة فندقية لا تُنسى وخدمات راقية لكل ضيف.</p>
                <ul class="list-unstyled mt-3">
                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> غرف فاخرة مع كافة وسائل الراحة</li>
                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> خدمة عملاء 24/7</li>
                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> موقع استراتيجي في قلب طرابلس</li>
                </ul>
            </div>
        </div>
    </div>
</section>


<section id="services" class="py-5 mt-5 section-gap" style="background: linear-gradient(135deg,#ffffff,#f0f9f4);">
    <div class="container text-center">

        <h2 class="fw-bold mb-5 text-success animate__animated animate__fadeInDown">
            خدماتنا
        </h2>

        <div class="row g-4">

            {{-- القواطع --}}
            <div class="col-md-4 animate__animated animate__zoomIn">
                <div class="p-4 bg-white rounded-4 shadow-lg h-100 transition hover-shadow">
                    <i class="fas fa-building fa-3x text-success mb-3"></i>
                    <h5 class="fw-bold mb-2">قواطع فندقية</h5>
                    <p class="mb-0">
                        يضم الفندق <strong>قاطعَين مستقلين</strong>، كل قاطع مصمم بعناية لتوفير الخصوصية والراحة للنزلاء.
                    </p>
                </div>
            </div>

            {{-- الغرف --}}
            <div class="col-md-4 animate__animated animate__zoomIn animate__delay-1s">
                <div class="p-4 bg-white rounded-4 shadow-lg h-100 transition hover-shadow">
                    <i class="fas fa-bed fa-3x text-success mb-3"></i>
                    <h5 class="fw-bold mb-2">غرف فندقية</h5>
                    <p class="mb-0">
                        يحتوي كل قاطع على <strong>8 غرف</strong>، بإجمالي <strong>16 غرفة</strong> مجهزة بكامل وسائل الراحة.
                    </p>
                </div>
            </div>

            {{-- مواقف السيارات --}}
            <div class="col-md-4 animate__animated animate__zoomIn animate__delay-2s">
                <div class="p-4 bg-white rounded-4 shadow-lg h-100 transition hover-shadow">
                    <i class="fas fa-parking fa-3x text-success mb-3"></i>
                    <h5 class="fw-bold mb-2">مواقف سيارات</h5>
                    <p class="mb-0">
                        يتوفر <strong>مكان مخصص لرصف السيارات</strong> لتوفير الراحة والأمان لجميع ضيوف الفندق.
                    </p>
                </div>
            </div>

        </div>

    </div>
</section>

<div style="height:120px"></div>


<section id="vision" class="py-5 mt-5 mt-lg-5">
    <div class="container text-center">
        <h2 class="fw-bold mb-5 text-success animate__animated animate__fadeInDown">رؤيتنا</h2>
        <div class="row g-4">
            <div class="col-md-4 animate__animated animate__zoomIn">
                <div class="p-4 bg-white rounded-4 shadow hover-shadow transition">
                    <i class="fas fa-star fa-3x text-success mb-3"></i>
                    <h5 class="fw-bold mb-2">التميز</h5>
                    <p>نسعى لتقديم تجربة ضيافة لا مثيل لها من حيث الراحة والخدمة.</p>
                </div>
            </div>
            <div class="col-md-4 animate__animated animate__zoomIn animate__delay-1s">
                <div class="p-4 bg-white rounded-4 shadow hover-shadow transition">
                    <i class="fas fa-heart fa-3x text-success mb-3"></i>
                    <h5 class="fw-bold mb-2">الاهتمام بالضيف</h5>
                    <p>نضع راحتك ورضاك في قلب أولوياتنا اليومية.</p>
                </div>
            </div>
            <div class="col-md-4 animate__animated animate__zoomIn animate__delay-2s">
                <div class="p-4 bg-white rounded-4 shadow hover-shadow transition">
                    <i class="fas fa-globe fa-3x text-success mb-3"></i>
                    <h5 class="fw-bold mb-2">الانتشار</h5>
                    <p>نطمح أن نكون الرائدين في مجال الضيافة في المنطقة بأكملها.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="location" class="py-5" style="background: linear-gradient(135deg,#f0f9f4,#e0f2f1);">
    <div class="container text-center">
        <h2 class="fw-bold mb-4 text-success animate__animated animate__fadeInDown">
            موقعنا
        </h2>

        <p class="mb-4">
            نحن في قلب طرابلس، يسعدنا استقبالكم في موقعنا المميز.
        </p>

        <div class="ratio ratio-21x9 mb-3 shadow rounded-4 animate__animated animate__fadeInUp mx-auto" 
             style="max-width: 700px;"> 
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d355.58288746245864!2d13.135806799796407!3d32.84644870537138!3m2!1i1024!2i768!4f13.1!5e1!3m2!1sar!2sus!4v1769091846981!5m2!1sar!2sus"
                style="border:0;"
                allowfullscreen
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>

        <a href="https://www.google.com/maps?q=32.84644870537138,13.135806799796407"
           target="_blank"
           class="btn btn-outline-success fw-bold rounded-pill px-4">
            📍 فتح الموقع في خرائط جوجل
        </a>
    </div>
</section>



    {{-- Contact --}}
    <section id="contact" class="section-padding" style="background: var(--light-bg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    @include('contact') {{-- استدعاء ملف الفورم المكتوب مسبقاً --}}
                </div>
                <div class="col-lg-6">
                                <div class="col-lg-6">

            </div>
                </div>
            </div>
        </div>
    </section>



</x-app-layout>


