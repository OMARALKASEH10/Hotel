<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 shadow">
            <div class="modal-header border-bottom-0 pb-0">
                <h5 class="modal-title fw-bold" id="loginModalLabel">تسجيل الدخول</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    
                    <div class="mb-3">
                        <label class="form-label small fw-bold">البريد الإلكتروني</label>
                        <input type="email" name="email" class="form-control form-control-lg rounded-3" placeholder="name@example.com" required autofocus>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold">كلمة المرور</label>
                        <input type="password" name="password" class="form-control form-control-lg rounded-3" placeholder="••••••••" required>
                    </div>

                    <div class="form-check mb-3 text-end">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember_me">
                        <label class="form-check-label small" for="remember_me">
                            تذكرني
                        </label>
                    </div>

                    <button type="submit" class="btn btn-primary-custom text-white w-100 py-3 fw-bold">
                        دخول
                    </button>

                    @if (Route::has('password.request'))
                        <div class="text-center mt-3">
                            <a class="text-decoration-none small text-muted" href="{{ route('password.request') }}">
                                نسيت كلمة المرور؟
                            </a>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>