<x-guest-layout>
    <style>
        /* تحسين الخلفية العامة للصندوق لزيادة الوضوح */
        .register-card { 
            border-top: 4px solid #10b981; 
            background-color: rgba(31, 41, 55, 1); /* رمادي غامق صريح */
            border-radius: 0.5rem;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.5);
        }
        .hotel-title { letter-spacing: 1px; text-shadow: 2px 2px 4px rgba(0,0,0,0.5); }
        
        /* تحسين وضوح الحقول عند الكتابة */
        .input-custom {
            background-color: #111827 !important; /* أسود كربوني */
            color: #ffffff !important;
            border-color: #374151 !important;
        }
        .input-focus-green:focus {
            border-color: #10b981 !important;
            --tw-ring-color: #10b981 !important;
            background-color: #1f2937 !important;
        }
    </style>

    <div class="text-center mb-8">
        <h1 class="text-4xl font-extrabold text-white hotel-title">
            فندق مجد الضيافة
        </h1>
        <p class="text-gray-200 text-base mt-2 font-medium">إنشاء حساب جديد للتمتع بخدماتنا</p>
        <div class="flex justify-center mt-4">
            <div class="h-1.5 w-24 bg-green-500 rounded-full shadow-lg"></div>
        </div>
    </div>
    

    <form method="POST" action="{{ route('register') }}" class="register-card p-6 shadow-2xl">
        @csrf

        <div class="mb-4">
            <x-input-label for="name" :value="__('الاسم الكامل')" class="text-right block w-full text-white font-bold mb-1" />
            <x-text-input id="name" class="block mt-1 w-full text-right input-focus-green input-custom py-3" type="text" name="name" :value="old('name')" required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-right text-red-400 font-bold" />
        </div>

        <div class="mb-4">
            <x-input-label for="email" :value="__('البريد الإلكتروني')" class="text-right block w-full text-white font-bold mb-1" />
            <x-text-input id="email" class="block mt-1 w-full text-right input-focus-green input-custom py-3" type="email" name="email" :value="old('email')" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-right text-red-400 font-bold" />
        </div>

<div class="mb-4">
    <x-input-label for="phone" :value="__('رقم الهاتف')" class="text-right block w-full text-white font-bold mb-1" />
    
    <x-text-input id="phone" 
        class="block mt-1 w-full text-right input-focus-green input-custom py-3" 
        type="text" 
        name="phone" 
        :value="old('phone')" 
        required 
        placeholder="09XXXXXXXX" 
        maxlength="10"
        oninput="this.value = this.value.replace(/[^0-9]/g, '');" {{-- تمنع أي رمز غير الأرقام فوراً --}}
        inputmode="numeric" {{-- تظهر لوحة أرقام فقط في الهواتف --}}
    />
    
    <p class="text-sm text-gray-300 mt-1 text-right font-medium italic">يجب إدخال 10 أرقام تبدأ بـ 09 (أرقام فقط).</p>
    <x-input-error :messages="$errors->get('phone')" class="mt-2 text-right text-red-400 font-bold" />
</div>

        <div class="mb-4">
            <x-input-label for="password" :value="__('كلمة المرور')" class="text-right block w-full text-white font-bold mb-1" />
            <x-text-input id="password" class="block mt-1 w-full text-right input-focus-green input-custom py-3"
                type="password" name="password" required />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-right text-red-400 font-bold" />
        </div>

        <div class="mb-4">
            <x-input-label for="password_confirmation" :value="__('تأكيد كلمة المرور')" class="text-right block w-full text-white font-bold mb-1" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full text-right input-focus-green input-custom py-3"
                type="password" name="password_confirmation" required />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-right text-red-400 font-bold" />
        </div>

        <div class="mt-8 flex flex-col gap-4">
            <x-primary-button class="w-full justify-center bg-green-600 hover:bg-green-500 text-white py-4 text-lg font-bold shadow-lg transition duration-300">
                {{ __('إنشاء الحساب') }}
            </x-primary-button>

            <div class="text-center py-2 border-t border-gray-700 mt-2">
                <span class="text-gray-200">لديك حساب بالفعل؟</span>
<a 
    href="{{ route('login') }}"
    class="inline-block px-4 py-2 mt-2
           text-green-600 font-bold
           border border-green-600 rounded-lg
           hover:bg-green-600 hover:text-white
           transition duration-300">
    تسجيل الدخول
</a>

            </div>
        </div>
    </form>
</x-guest-layout>