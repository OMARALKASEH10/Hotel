<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View as FacadesView;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
           if(auth()->check() && auth()->user()->is_admin){
        return view('auth.register'); // السماح للأدمن بإضافة حساب جديد
    }

    // أما المستخدم العادي المسجل دخول، يتم تحويله
    if(auth()->check()){
        return redirect()->route('home');
    }
    return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'phone' => [
                'required',
                'string',
                'regex:/^(091|092|093|094|095)[0-9]{7}$/', // التحقق من البداية والطول
                'unique:users,phone', // ✅ منع التكرار في جدول users
            ],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ], [
            'phone.regex' => 'رقم الهاتف غير صالح. يجب أن يكون 10 أرقام ويبدأ بـ 091, 092, 093, 094 أو 095',
            'phone.unique' => 'رقم الهاتف هذا مسجل مسبقاً.',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('home', absolute: false));
    }
}
