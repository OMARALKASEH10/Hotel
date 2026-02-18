<x-guest-layout>
    <style>
        /* تحسينات بصرية إضافية */

        .hotel-title {
            letter-spacing: 1px;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
        }
        .input-focus-green:focus {
            border-color: #10b981 !important;
            --tw-ring-color: #10b981 !important;
        }
    </style>

    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-green-600 dark:text-green-500 hotel-title">
            فندق مجد الضيافة
        </h1>
        <p class="text-gray-500 dark:text-gray-400 text-sm mt-2">نعتز بخدمتكم في كل وقت</p>
        <div class="flex justify-center mt-4">
            <div class="h-1 w-20 bg-green-500 rounded"></div>
        </div>
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="login-card">
        @csrf

        <div>
            <x-input-label for="email" :value="__('البريد الإلكتروني')" class="text-right block w-full text-gray-700 dark:text-gray-300" />
            <x-text-input id="email" class="block mt-1 w-full text-right input-focus-green bg-gray-50 dark:bg-gray-800" 
                          type="email" name="email" :value="old('email')" required autofocus />
           <x-input-error :messages="$errors->get('email')" class="mt-2 text-right" />
        </div>

        <div class="mt-6">
            <x-input-label for="password" :value="__('كلمة المرور')" class="text-right block w-full text-gray-700 dark:text-gray-300" />
            <x-text-input id="password" class="block mt-1 w-full text-right input-focus-green bg-gray-50 dark:bg-gray-800"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-right" />
        </div>

<div class="flex items-center justify-end mt-6"> {{-- تغيير justify-between إلى justify-end لدفعه لليمين --}}
    
    <label for="remember_me" class="inline-flex items-center cursor-pointer" dir="rtl"> {{-- إضافة dir="rtl" لترتيب المربع والنص --}}
        <input id="remember_me" type="checkbox" 
               class="rounded border-gray-300 dark:border-gray-700 text-green-600 shadow-sm focus:ring-green-500 dark:focus:ring-offset-gray-800" 
               name="remember">
        
        <span class="mr-2 text-sm text-gray-600 dark:text-gray-400"> {{-- تغيير me-2 إلى mr-2 لضبط المسافة بعد قلب الاتجاه --}}
            {{ __('تذكرني') }}
        </span>
    </label>

</div>
        <div class="mt-8 flex flex-col gap-4">
            <x-primary-button class="w-full justify-center bg-green-600 hover:bg-green-700 py-3 text-lg shadow-lg transition-all active:scale-95">
                {{ __('تسجيل الدخول') }}
            </x-primary-button>

            @if (Route::has('register'))
                <div class="text-center">
                    <span class="text-sm text-gray-600 dark:text-gray-400">ليس لديك حساب؟</span>
                    <a class="text-sm font-bold text-green-600 dark:text-green-500 hover:underline ms-1" href="{{ route('register') }}">
                        {{ __('إنشاء حساب جديد') }}
                    </a>
                </div>
            @endif
        </div>
    </form>
</x-guest-layout>