<x-app-layout>

        <style>
    .top-bar, footer, .footer { display: none !important; }
    .navbar-nav, .nav-links-container { display: none !important; }
    .nav-link[href*="#"] { display: none !important; }
</style>

<div class="container py-5">

    <div class="d-flex justify-content-between mb-4">
        <h2 class="fw-bold">سحوبات الادمن</h2>
        <a href="{{ route('admin.giveaway.campaign.create') }}" class="btn btn-success">➕ إضافة حملة جديدة</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($campaigns->count())
    <div class="table-responsive">
        <table class="table table-bordered text-center">
            <thead class="table-info">
                <tr>
                    <th>#</th>
                    <th>الاسم</th>
                    <th>الوصف</th>
                    <th>تاريخ البداية</th>
                    <th>تاريخ النهاية</th>
                    <th>الحالة</th>
                    <th>إجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach($campaigns as $c)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $c->name }}</td>
                    <td>{{ $c->description }}</td>
                    <td>{{ $c->start_date }}</td>
                    <td>{{ $c->end_date }}</td>
                    <td>{{ $c->status() }}</td>
                    <td>
                        <a href="{{ route('admin.giveaway.campaign.edit', $c->id) }}" class="btn btn-sm btn-primary">✏️ تعديل</a>
                        <form action="{{ route('admin.giveaway.campaign.destroy', $c->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('هل أنت متأكد؟')">🗑️ حذف</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
        <p class="text-muted">لا توجد حملات حتى الآن.</p>
    @endif
</div>
</x-app-layout>
