<div class="modal fade" id="raffleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm"> {{-- modal-sm لجعلها نافذة صغيرة --}}
        <div class="modal-content rounded-4 border-0 shadow-lg">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-bold text-success w-100 text-center">🎁 دخول السحب</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form method="POST" action="{{ route('contact.store') }}">
                    @csrf
                    {{-- حقل مخفي لتمييز أن هذا الطلب خاص بالسحب --}}
                    <input type="hidden" name="topic" value="مشاركة في سحب الإقامة المجانية">
                    
                    <div class="mb-3">
                        <label class="form-label small fw-bold">الاسم الكامل</label>
                        <input type="text" name="name" class="form-control rounded-3" placeholder="أدخل اسمك" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label small fw-bold">رقم الهاتف</label>
                        <input type="tel" name="phone" class="form-control rounded-3" placeholder="09XXXXXXXX" required>
                    </div>

                    <button type="submit" class="btn btn-primary-custom w-100 fw-bold py-2 shadow-sm">
                        تأكيد المشاركة
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>