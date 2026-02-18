<x-app-layout>
<style>
    /* الإعدادات العامة للملف */
    body {
        background-color: #f8fafc;
        font-family: 'Tajawal', sans-serif;
    }

    .admin-wrapper {
        min-height: 90vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2rem 1rem;
    }

    /* الكارت الرئيسي */
    .premium-card {
        background: #ffffff;
        border-radius: 24px;
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.05);
        border: 1px solid rgba(0, 0, 0, 0.03);
        overflow: hidden;
        width: 100%;
        max-width: 550px;
    }

    /* رأس الكارت */
    .card-header-gradient {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        padding: 40px 30px;
        text-align: center;
        color: white;
    }

    .header-icon {
        background: rgba(255, 255, 255, 0.2);
        width: 70px;
        height: 70px;
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 15px;
        font-size: 30px;
        backdrop-filter: blur(5px);
    }

    .card-header-gradient h1 {
        font-size: 1.6rem;
        font-weight: 800;
        margin: 0;
    }

    /* فورم الإدخال */
    .form-container {
        padding: 40px;
    }

    .input-group-custom {
        margin-bottom: 20px;
        position: relative;
    }

    .input-group-custom label {
        display: block;
        font-weight: 700;
        color: #374151;
        margin-bottom: 8px;
        font-size: 0.9rem;
    }

    .input-wrapper {
        position: relative;
    }

    .input-wrapper i {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #9ca3af;
        transition: 0.3s;
    }

    .form-input-premium {
        width: 100%;
        background: #f9fafb !important;
        border: 2px solid #f3f4f6 !important;
        border-radius: 14px !important;
        padding: 12px 45px 12px 15px !important; /* مساحة للأيقونة على اليمين */
        font-size: 1rem;
        color: #1f2937;
        transition: all 0.3s ease;
    }

    .form-input-premium:focus {
        background: #fff !important;
        border-color: #10b981 !important;
        box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.1) !important;
        outline: none;
    }

    .form-input-premium:focus + i {
        color: #10b981;
    }

    /* أزرار الإجراءات */
    .btn-save-admin {
        background: #10b981;
        color: white;
        width: 100%;
        padding: 15px;
        border-radius: 16px;
        font-weight: 700;
        font-size: 1.1rem;
        border: none;
        cursor: pointer;
        transition: all 0.3s;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        margin-top: 10px;
    }

    .btn-save-admin:hover {
        background: #059669;
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(16, 185, 129, 0.2);
    }

    .btn-cancel {
        display: block;
        text-align: center;
        margin-top: 20px;
        color: #6b7280;
        text-decoration: none;
        font-size: 0.9rem;
        font-weight: 600;
    }

    .btn-cancel:hover {
        color: #374151;
    }

    /* رسائل الخطأ */
    .error-msg {
        color: #dc2626;
        font-size: 0.8rem;
        margin-top: 5px;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 4px;
    }

    /* إلغاء القوائم العلوية والسفلية كما طلبت */
    .top-bar, footer, .footer, nav { display: none !important; }
</style>

<div class="admin-wrapper">
    <div class="premium-card">
        <div class="card-header-gradient">
            <div class="header-icon">
                <i class="fas fa-user-shield"></i>
            </div>
            <h1>إضافة مسؤول جديد</h1>
            <p class="opacity-80 mt-1">قم بتعبئة البيانات لمنح صلاحيات الإدارة</p>
        </div>

        <div class="form-container">
            <form method="POST" action="{{ route('admin.users.store') }}">
                @csrf

                <div class="input-group-custom">
                    <label>الاسم الكامل</label>
                    <div class="input-wrapper">
                        <input type="text" name="name" class="form-input-premium" placeholder="أدخل الاسم الثلاثي" required autofocus value="{{ old('name') }}">
                        <i class="fas fa-id-card"></i>
                    </div>
                    @error('name') <span class="error-msg"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span> @enderror
                </div>

                <div class="input-group-custom">
                    <label>البريد الإلكتروني الرسمي</label>
                    <div class="input-wrapper">
                        <input type="email" name="email" class="form-input-premium" placeholder="example@hotel.com" required value="{{ old('email') }}">
                        <i class="fas fa-envelope"></i>
                    </div>
                    @error('email') <span class="error-msg"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span> @enderror
                </div>

                <div class="input-group-custom">
                    <label>رقم الهاتف</label>
                    <div class="input-wrapper">
                        <input type="text" name="phone" class="form-input-premium" placeholder="09XXXXXXXX" required maxlength="10" oninput="this.value=this.value.replace(/[^0-9]/g,'')">
                        <i class="fas fa-phone"></i>
                    </div>
                    @error('phone') <span class="error-msg"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span> @enderror
                </div>

                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="input-group-custom">
                            <label>كلمة المرور</label>
                            <div class="input-wrapper">
                                <input type="password" name="password" class="form-input-premium" placeholder="••••••••" required>
                                <i class="fas fa-lock"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group-custom">
                            <label>تأكيد الكلمة</label>
                            <div class="input-wrapper">
                                <input type="password" name="password_confirmation" class="form-input-premium" placeholder="••••••••" required>
                                <i class="fas fa-check-double"></i>
                            </div>
                        </div>
                    </div>
                </div>
                @error('password') <span class="error-msg mb-3"><i class="fas fa-exclamation-circle"></i> {{ $message }}</span> @enderror

                <button type="submit" class="btn-save-admin">
                    <i class="fas fa-user-plus"></i>
                    اعتماد حساب الأدمن
                </button>

                <a href="{{ route('admin.dashboard') }}" class="btn-cancel">
                    إلغاء والعودة للوحة التحكم
                </a>
            </form>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</x-app-layout>