<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function create()
    {
        return view('admin.users.create'); // صفحة الفورم
    }
    
    public function store(Request $request)
    {    $validated = $request->validate([
        'name'  => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'phone' => [
            'required',
            'string',
            'regex:/^(091|092|093|094|095)[0-9]{7}$/',
            'unique:users,phone',
        ],
        'password' => 'required|min:8|confirmed',
    ], [
        'phone.regex'  => 'رقم الهاتف يجب أن يبدأ بـ 091, 092, 093, 094, 095 ويحتوي على 10 أرقام.',
        'phone.unique' => 'رقم الهاتف مسجل مسبقًا.',
        'email' => 'هاذه الأيميل مسجل مسبقا'
    ]);

    User::create([
        'name'     => $validated['name'],
        'email'    => $validated['email'],
        'phone'    => $validated['phone'],
        'password' => Hash::make($validated['password']),
        'is_admin' => true, // ✅ أدمن
    ]);

        return redirect()->route('admin.users')->with('success', 'تم إضافة الأدمن بنجاح');
    }

    // عرض كل المستخدمين
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->get();
        return view('admin.users', compact('users'));
    }

    // صفحة تعديل المستخدم
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.editUser', compact('user'));
    }

    // تحديث المستخدم
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20'
        ]));
        return redirect()->route('admin.users')->with('success', 'تم تعديل المستخدم بنجاح');
    }

    // حذف المستخدم
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return back()->with('success', 'تم حذف المستخدم بنجاح');
    }
}
