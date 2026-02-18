<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<style>
    :root {
        --primary-green: #10b981;
        --dark-green: #065f46;
        --accent-color: #34d399;
        --glass-bg: rgba(255, 255, 255, 0.95);
        --text-main: #111827;
        --text-secondary: #4b5563;
    }

    .contact-section {
        background-color: #f8fafc;
        background-image: radial-gradient(circle at 10% 20%, rgba(16, 185, 129, 0.03) 0%, transparent 40%),
                          radial-gradient(circle at 90% 80%, rgba(16, 185, 129, 0.03) 0%, transparent 40%);
        padding: 120px 0;
        font-family: 'Tajawal', sans-serif;
        direction: rtl;
    }

    /* الـ Badge العلوي */
    .contact-badge {
        display: inline-flex;
        align-items: center;
        background: white;
        color: var(--primary-green);
        padding: 6px 16px;
        border-radius: 50px;
        font-weight: 700;
        font-size: 0.9rem;
        box-shadow: 0 4px 10px rgba(0,0,0,0.03);
        margin-bottom: 25px;
        border: 1px solid rgba(16, 185, 129, 0.1);
    }

    .contact-heading {
        font-size: 3rem;
        font-weight: 800;
        color: var(--text-main);
        line-height: 1.3;
        margin-bottom: 25px;
    }

    .contact-heading span {
        background: linear-gradient(120deg, var(--primary-green), var(--dark-green));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    /* قائمة المميزات الاحترافية */
    .feature-item {
        background: white;
        padding: 15px 20px;
        border-radius: 18px;
        margin-bottom: 15px;
        transition: 0.3s;
        border: 1px solid transparent;
        display: flex;
        align-items: center;
        gap: 15px;
        box-shadow: 0 4px 6px -1px rgba(0,0,0,0.02);
    }

    .feature-item:hover {
        transform: translateX(-5px);
        border-color: rgba(16, 185, 129, 0.2);
        box-shadow: 0 10px 15px -3px rgba(0,0,0,0.05);
    }

    .feature-item i {
        color: var(--primary-green);
        font-size: 1.2rem;
    }

    /* أزرار التواصل الاجتماعي */
    .social-btn {
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        background: white;
        border: 1px solid #e5e7eb;
        padding: 14px;
        border-radius: 16px;
        font-weight: 700;
        color: var(--text-main);
        transition: 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        text-decoration: none;
    }

    .social-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.06);
        border-color: var(--primary-green);
        color: var(--primary-green);
    }

    /* كارد الفورم Glass */
    .contact-card {
        background: var(--glass-bg);
        backdrop-filter: blur(10px);
        border-radius: 40px;
        padding: 50px;
        border: 1px solid white;
        box-shadow: 0 25px 50px -12px rgba(0,0,0,0.08);
    }

    .form-group-custom {
        position: relative;
        margin-bottom: 25px;
    }

    .form-group-custom label {
        font-weight: 700;
        color: var(--text-secondary);
        font-size: 0.9rem;
        margin-bottom: 10px;
        display: block;
    }

    .form-control-custom {
        width: 100%;
        background: #f1f5f9;
        border: 2px solid transparent;
        border-radius: 18px;
        padding: 16px 50px 16px 20px;
        font-size: 1rem;
        font-weight: 500;
        transition: 0.3s;
    }

    .form-control-custom:focus {
        background: white;
        border-color: var(--primary-green);
        box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.1);
        outline: none;
    }

    .form-group-custom i {
        position: absolute;
        right: 20px;
        top: 48px;
        color: #94a3b8;
        font-size: 1.1rem;
        transition: 0.3s;
    }

    .form-control-custom:focus + i {
        color: var(--primary-green);
    }

    /* زر الإرسال النهائي */
    .btn-submit-premium {
        background: linear-gradient(135deg, var(--primary-green), var(--dark-green));
        color: white;
        border: none;
        width: 100%;
        padding: 18px;
        border-radius: 20px;
        font-weight: 800;
        font-size: 1.1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
        transition: 0.4s;
        cursor: pointer;
    }

    .btn-submit-premium:hover {
        transform: translateY(-4px);
        box-shadow: 0 20px 30px rgba(16, 185, 129, 0.3);
        filter: brightness(1.1);
    }

    @media (max-width: 991px) {
        .contact-section { padding: 60px 0; }
        .contact-heading { font-size: 2.2rem; text-align: center; }
        .contact-badge { margin: 0 auto 20px; display: table; }
        .contact-card { padding: 30px; margin-top: 30px; }
    }
</style>

<section class="contact-section">
    <div class="container">
        <div class="row align-items-center g-5">
            
            <div class="col-lg-5 order-2 order-lg-1">
                <div class="contact-badge">
                    <i class="fas fa-comment-dots ms-2"></i> نحن دائماً بالقرب
                </div>

                <h2 class="contact-heading">
                    هل لديك استفسار؟<br>
                    <span>فريقنا جاهز للإجابة</span>
                </h2>

                <div class="feature-list mb-5">
                    <div class="feature-item">
                        <i class="fas fa-bolt"></i>
                        <span>رد سريع جداً خلال أقل من 15 دقيقة</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-user-tie"></i>
                        <span>تواصل مباشر مع مستشارينا المختصين</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-shield-alt"></i>
                        <span>بياناتك محمية وخصوصيتك أولويتنا</span>
                    </div>
                </div>

                <div class="d-flex gap-3">
<a href="https://wa.me/{{ Setting::get('phone', '0914002252') }}" class="social-btn">
    <i class="fab fa-whatsapp text-success"></i>
    واتساب
</a>

                    <a href="https://www.facebook.com/omar.alkaseh.2025" class="social-btn">
                        <i class="fab fa-facebook-f text-primary"></i>
                        فيسبوك
                    </a>
                </div>
            </div>

            <div class="col-lg-7 order-1 order-lg-2">
                <div class="contact-card">
                    <form id="contactForm" method="POST" action="{{ route('contact.store') }}">
                    @csrf
                    <div class="form-group-custom">
                        <label>الاسم الكامل</label>
                        <input type="text" name="name" class="form-control-custom" placeholder="الأسم كامل" required>
                        <i class="far fa-user"></i>
                    </div>

                    <div class="form-group-custom">
                        <label>رقم الهاتف</label>
                        <input type="tel" name="phone" class="form-control-custom" placeholder="09XXXXXXXX" required>
                        <i class="fas fa-mobile-alt"></i>
                    </div>

                    <div class="form-group-custom">
                        <label>تفاصيل الرسالة</label>
                        <textarea name="topic" class="form-control-custom" style="min-height: 140px; resize: none;" placeholder="اكتب استفسارك هنا بكل وضوح..."></textarea>
                        <i class="far fa-comment-alt"></i>
                    </div>

                    <button type="submit" class="btn-submit-premium">
                        إرسال الرسالة الآن
                        <i class="fas fa-paper-plane shadow-none"></i>
                    </button>
                </form>

                </div>
            </div>

        </div>
    </div>
</section>


<script>
document.getElementById('contactForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const formData = new FormData(this);

    fetch("{{ route('contact.store') }}", {
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}",
            'Accept': 'application/json' // مهم جدًا لجعل Laravel يرجع JSON
        },
        body: formData
    })
    .then(res => {
        if (!res.ok) {
            return res.json().then(errors => {
                let errorMsg = '';
                for (const field in errors.errors) {
                    errorMsg += errors.errors[field].join('<br>') + '<br>';
                }
                throw new Error(errorMsg);
            });
        }
        return res.json();
    })
    .then(data => {
        if (data.success && data.whatsapp_url) {
            window.location.href = data.whatsapp_url;
        }
    })
    .catch(err => {
        Swal.fire({
            icon: 'error',
            title: 'خطأ في الإرسال',
            html: err.message.replace(/\n/g, '<br>'),
            confirmButtonText: 'حسناً'
        });
    });
});

</script>