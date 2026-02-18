<x-app-layout>
<style>
    body {
        background: #f4f6f9;
    }

    .container {
        max-width: 1200px;
        margin-top: 40px;
    }

    h2, h4, h5 {
        color: #1e3a5f;
    }

    .card {
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        transition: transform 0.2s;
        cursor: pointer;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    .card-body h5 {
        font-weight: 600;
        margin-bottom: 10px;
    }

    .card-body h2 {
        font-size: 2rem;
        color: #1e3a5f;
    }

    .btn-primary, .btn-outline-primary, .btn-warning, .btn-success {
        border-radius: 8px;
        font-weight: 600;
        padding: 8px 20px;
    }

    .top-info p {
        font-weight: 600;
        color: #155724;
    }

    .table thead th {
        vertical-align: middle;
        text-align: center;
    }

    .table tbody td {
        vertical-align: middle;
        text-align: center;
    }

    .card-header-custom {
        background: #1e3a5f;
        color: white;
        border-radius: 10px 10px 0 0;
        padding: 8px 15px;
    }

</style>

    <style>
    .top-bar, footer, .footer { display: none !important; }
    .navbar-nav, .nav-links-container { display: none !important; }
    .nav-link[href*="#"] { display: none !important; }
    </style>

<div class="container py-5">

<div class="mb-4 text-start">
        <h2 class="fw-bold mb-2">لوحة التحكم</h2>
        <a href="{{ route('home') }}" class="btn btn-outline-primary shadow-sm">
            🏠 العودة للصفحة الرئيسية
        </a>
    </div>

    <!-- معلومات الفندق -->
    <div class="row g-4 mb-5">
        <div class="col-md-6">
            <div class="card p-3">
                <h5 class="fw-bold">📞 الرقم الرئيسي للفندق</h5>
                <p>{{ $phone }}</p>
            </div>
        </div>
<div class="col-md-6">
    <div class="card p-3">
        <h5 class="fw-bold">⏰ أيام وساعات العمل</h5>
        <p>{{ $working_schedule }}</p>
        <a href="{{ route('admin.settings') }}" class="btn btn-outline-primary btn-sm mt-2">✏️ تعديل الإعدادات</a>
    </div>
</div>

    </div>

<!-- كروت الإحصائيات + الأدمن -->
<div class="row g-4 mb-5">

    <!-- الرسائل -->
    <div class="col-md-4">
        <a href="{{ route('admin.messages') }}" class="text-decoration-none">
            <div class="card text-center p-3">
                <div class="card-body">
                    <h5>📩 الرسائل</h5>
                    <h2>{{ $messagesCount }}</h2>
                </div>
            </div>
        </a>
    </div>

    <!-- المشاركين -->
    <div class="col-md-4">
        <a href="{{ route('admin.giveaway') }}" class="text-decoration-none">
            <div class="card text-center p-3">
                <div class="card-body">
                    <h5>🎉 المشاركين</h5>
                    <h2>{{ $entriesCount }}</h2>
                </div>
            </div>
        </a>
    </div>

    <!-- الأدمن الحالي -->
    <div class="col-md-4">
        <div class="card text-center p-3 h-100">
            <div class="card-body d-flex flex-column justify-content-between">
                <div>
                    <h5>👤 الأدمن الحالي</h5>
                    <h4>{{ auth()->user()->name }}</h4>
                </div>
                <div class="mt-3">
                    <a href="{{ route('admin.users.create') }}" class="btn btn-sm btn-primary w-100 mb-2">
                        ➕ إضافة أدمن جديد
                    </a>
                    <a href="{{ route('admin.users') }}" class="btn btn-sm btn-outline-secondary w-100">
                        📋 إدارة الحسابات
                    </a>
                </div>
            </div>
        </div>
    </div>

</div>



<!-- آخر السحوبات -->
<div class="mb-5">
    <h4 class="fw-bold mb-3">سحوبات الأدمن</h4>

    @if($campaigns->count())
        <div class="table-responsive">
            <table class="table table-bordered table-hover text-center">
                <thead class="table-info">
                    <tr>
                        <th>#</th>
                        <th>اسم الحملة</th>
                        <th>الوصف</th>
                        <th>تاريخ البداية</th>
                        <th>تاريخ النهاية</th>
                        <th>الحالة</th>
                        <th>إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($campaigns as $campaign)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $campaign->name }}</td>
                            <td>{{ $campaign->description }}</td>
                            <td>{{ \Carbon\Carbon::parse($campaign->start_date)->format('Y-m-d') }}</td>
                            <td>{{ \Carbon\Carbon::parse($campaign->end_date)->format('Y-m-d') }}</td>
                            <td>
                                @if($campaign->draw_done)
                                    <span class="badge bg-danger">منتهية</span>
                                @elseif(\Carbon\Carbon::now()->lt($campaign->start_date))
                                    <span class="badge bg-secondary">قادمة</span>
                                @else
                                    <span class="badge bg-success">نشطة</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.giveaway.campaign.edit', $campaign->id) }}" class="btn btn-sm btn-primary">✏️ تعديل</a>
                                <form action="{{ route('admin.giveaway.campaign.destroy', $campaign->id) }}" method="POST" class="d-inline delete-form">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger btn-delete">🗑️ حذف</button>
</form>

   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const deleteForms = document.querySelectorAll('.delete-form');

    deleteForms.forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault(); // منع الفورم من الإرسال مباشرة

            Swal.fire({
                title: 'هل أنت متأكد؟',
                text: "لن تتمكن من التراجع عن هذا الإجراء!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'نعم، احذف!',
                cancelButtonText: 'إلغاء'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // إرسال الفورم إذا ضغط على نعم
                }
            });
        });
    });
});
</script>

                                
                                {{-- زر تنفيذ السحب --}}
@if(!$campaign->draw_done && $campaign->entries->count())
    <a href="{{ route('admin.giveaway.draw.page', $campaign->id) }}" 
       class="btn btn-sm btn-success">
       🎯 تنفيذ السحب
    </a>
@endif



                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-muted">لا توجد سحوبات حتى الآن.</p>
        <a href="{{ route('admin.giveaway.campaign.create') }}" class="btn btn-success mt-2">➕ إضافة حملة جديدة</a>
    @endif
</div>





    <!-- آخر المشاركين -->
    <div class="mb-5">
        <h4 class="fw-bold mb-3">آخر المشاركين في السحب</h4>
        @if($latestEntries->count())
            <div class="table-responsive">
                <table class="table table-bordered table-hover text-center">
                    <thead class="table-warning">
                        <tr>
                            <th>#</th>
                            <th>الاسم</th>
                            <th>الهاتف</th>
                            <th>تاريخ المشاركة</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($latestEntries as $entry)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $entry->name }}</td>
                            <td>{{ $entry->phone }}</td>
                            <td>{{ $entry->created_at->format('Y-m-d H:i') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <a href="{{ route('admin.giveaway') }}" class="btn btn-warning mt-2">عرض كل المشاركين</a>
        @else
            <p class="mt-3 text-muted">لا يوجد مشاركين حتى الآن.</p>
        @endif
    </div>

    <!-- آخر المستخدمين -->
    <div class="mb-5">
        <h4 class="fw-bold mb-3">آخر المستخدمين</h4>
        <div class="table-responsive">
            <table class="table table-bordered table-hover text-center">
                <thead class="table-primary">
                    <tr>
                        <th>#</th>
                        <th>الاسم</th>
                        <th>البريد</th>
                        <th>تاريخ التسجيل</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($latestUsers as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->format('Y-m-d H:i') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <a href="{{ route('admin.users') }}" class="btn btn-primary mt-2">عرض كل المستخدمين</a>
    </div>

    <!-- آخر الرسائل -->
    <div class="mb-5">
        <h4 class="fw-bold mb-3">آخر رسائل الزبائن</h4>
        <div class="table-responsive">
            <table class="table table-bordered table-hover text-center">
                <thead class="table-success">
                    <tr>
                        <th>#</th>
                        <th>الاسم</th>
                        <th>الهاتف</th>
                        <th>الرسالة</th>
                        <th>التاريخ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($latestMessages as $msg)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $msg->name }}</td>
                        <td>{{ $msg->phone }}</td>
                        <td>{{ $msg->topic }}</td>
                        <td>{{ $msg->created_at->format('Y-m-d H:i') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <a href="{{ route('admin.messages') }}" class="btn btn-success mt-2">عرض كل الرسائل</a>
    </div>
</div>
</x-app-layout>
