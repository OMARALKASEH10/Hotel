<x-app-layout>
    <style>
        /* 1. إخفاء العناصر غير المرغوب فيها في لوحة التحكم */
        .top-bar, footer, .footer { display: none !important; }
        .navbar-nav, .nav-links-container { display: none !important; }
        .nav-link[href*="#"] { display: none !important; }

        /* 2. ضبط الحاوية بالكامل لتبدأ من اليمين */
        .edit-entry-container {
            direction: rtl;
            text-align: right;
        }

        /* 3. توحيد الحقول لتكون المحاذاة والبداية من اليمين تماماً */
        .form-control {
            direction: rtl !important;
            text-align: right !important;
        }

        /* 4. تنسيق التسميات */
        .form-label {
            font-weight: bold;
            color: #333;
            margin-bottom: 8px;
            display: block;
        }
    </style>

    <div class="container py-5 edit-entry-container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                
                {{-- العنوان محاذي لليمين تماماً --}}
                <h2 class="fw-bold mb-4">تعديل المشاركة</h2>

                <div class="card shadow-sm border-0 rounded-4">
                    <div class="card-body p-4">
                        <form action="{{ route('admin.giveaway.update', $entry->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            {{-- حقل الاسم --}}
                            <div class="mb-4">
                                <label class="form-label">الاسم</label>
                                <input type="text" name="name" class="form-control py-2" value="{{ $entry->name }}" required>
                            </div>

                            {{-- حقل الهاتف --}}
                            <div class="mb-4">
                                <label class="form-label">رقم الهاتف</label>
                                <input type="text" name="phone" class="form-control py-2" placeholder="رقم الهاتف" required value="{{ $entry->phone }}">
                            </div>

                            {{-- الأزرار تبدأ من اليمين --}}
                            <div class="d-flex justify-content-start gap-2 mt-4">
                                <button type="submit" class="btn btn-success px-5 fw-bold">حفظ التغييرات</button>
                                <a href="{{ route('admin.giveaway') }}" class="btn btn-secondary px-4">إلغاء</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>