<x-app-layout>

    <style>
        .top-bar, footer, .footer { display: none !important; }
        .navbar-nav, .nav-links-container { display: none !important; }
        .nav-link[href*="#"] { display: none !important; }
    </style>

    <div class="container py-5">

        <h2 class="fw-bold mb-4">
            {{ isset($campaign) ? 'تعديل الحملة' : 'إنشاء حملة جديدة' }}
        </h2>

        <form action="{{ isset($campaign) ? route('admin.giveaway.campaign.update', $campaign->id) : route('admin.giveaway.campaign.store') }}" method="POST">
            @csrf
            @if(isset($campaign))
                @method('PUT')
            @endif

            <!-- اسم الحملة -->
            <div class="mb-3">
                <label class="form-label">اسم الحملة</label>
                <input type="text" name="name" class="form-control" required
                       value="{{ isset($campaign) ? old('name', $campaign->name) : old('name') }}">
            </div>

            <!-- وصف الحملة -->
            <div class="mb-3">
                <label class="form-label">الوصف</label>
                <textarea name="description" class="form-control">{{ isset($campaign) ? old('description', $campaign->description) : old('description') }}</textarea>
            </div>

            <!-- تاريخ البداية -->
            <div class="mb-3">
                <label class="form-label">تاريخ البداية</label>
                <input type="datetime-local" name="start_date" class="form-control" required
                       value="{{ isset($campaign) ? \Carbon\Carbon::parse($campaign->start_date)->format('Y-m-d\TH:i') : old('start_date') }}">
            </div>

            <!-- تاريخ النهاية -->
            <div class="mb-3">
                <label class="form-label">تاريخ النهاية</label>
                <input type="datetime-local" name="end_date" class="form-control" required
                       value="{{ isset($campaign) ? \Carbon\Carbon::parse($campaign->end_date)->format('Y-m-d\TH:i') : old('end_date') }}">
            </div>

            <!-- حالة السحب (للتعديل فقط) -->
            @if(isset($campaign))
                <div class="mb-3 form-check">
                    <input type="hidden" name="draw_done" value="0">
                    <input type="checkbox" class="form-check-input" name="draw_done" value="1" {{ $campaign->draw_done ? 'checked' : '' }}>
                    <label class="form-check-label">تم السحب؟</label>
                </div>
            @endif

            <button class="btn btn-success">
                {{ isset($campaign) ? 'تحديث الحملة' : 'إنشاء الحملة' }}
            </button>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">رجوع</a>
        </form>

    </div>

</x-app-layout>
