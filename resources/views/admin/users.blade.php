<x-app-layout>
<style>
    .top-bar, footer, .footer { display: none !important; }
    .navbar-nav, .nav-links-container { display: none !important; }
    .nav-link[href*="#"] { display: none !important; }
</style>

<div class="container py-5">
    <h2 class="fw-bold mb-4">👥 المستخدمين</h2>

    <table class="table table-bordered table-hover">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>الاسم</th>
                <th>الهاتف</th>
                <th>البريد</th>
                <th>تاريخ التسجيل</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at->format('Y-m-d H:i A') }}</td>
                <td class="d-flex gap-2">
                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-warning">تعديل</a>
<form action="{{ route('admin.users.delete', $user->id) }}" method="POST" class="delete-form">
    @csrf
    @method('DELETE')
    <button type="button" class="btn btn-sm btn-danger btn-delete">حذف</button>
</form>

                </td>
            </tr>
            @endforeach
            <!-- CDN SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        </tbody>
    </table>
</div>
</x-app-layout>

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

