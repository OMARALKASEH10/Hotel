<x-app-layout>
<style>
    .top-bar, footer, .footer { display: none !important; }
    .navbar-nav, .nav-links-container { display: none !important; }
    .nav-link[href*="#"] { display: none !important; }
</style>

@if($entries->count())
<table class="table table-bordered table-hover">
    <thead class="table-warning">
        <tr>
            <th>#</th>
            <th>الاسم</th>
            <th>الهاتف</th>
            <th>تاريخ المشاركة</th>
            <th>الإجراءات</th>
        </tr>
    </thead>
    <tbody>
        @foreach($entries as $entry)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $entry->name }}</td>
            <td>{{ $entry->phone }}</td>
            <td>{{ $entry->created_at->format('Y-m-d H:i A') }}</td>
            <td class="d-flex gap-2">
                <a href="{{ route('admin.giveaway.edit', $entry->id) }}" class="btn btn-sm btn-warning">تعديل</a>
                <form action="{{ route('admin.giveaway.delete', $entry->id) }}" method="POST" class="delete-form">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-sm btn-danger btn-delete">حذف</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<p class="text-muted">لا يوجد مشاركين في هذه الحملة حتى الآن.</p>
@endif




</div>
</x-app-layout>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const deleteButtons = document.querySelectorAll('.btn-delete');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function() {
            const form = this.closest('form'); // الفورم المرتبط بالزر

            Swal.fire({
                title: 'هل أنت متأكد؟',
                text: "لن تستطيع التراجع عن هذه العملية!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33', // لون الحذف
                cancelButtonColor: '#3085d6', // لون إلغاء
                confirmButtonText: 'نعم، احذف!',
                cancelButtonText: 'إلغاء'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // إرسال الفورم إذا ضغط نعم
                }
            });
        });
    });
});
</script>
