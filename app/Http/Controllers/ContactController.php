<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http as FacadesHttp;

class ContactController extends Controller
{
    public function create()
    {
        return view('contact'); // صفحة الفورم
    }

    public function store(Request $request)
    {
        // تحقق من البيانات مع رسالة عربية
        $messages = [
            'name.required' => 'حقل الاسم الكامل مطلوب.',
            'name.string'   => 'حقل الاسم الكامل يجب أن يكون نصًا.',
            'name.max'      => 'حقل الاسم الكامل لا يمكن أن يزيد عن 100 حرف.',
            'phone.required'=> 'حقل رقم الهاتف مطلوب.',
            'phone.string'  => 'حقل رقم الهاتف يجب أن يكون نصًا.',
            'phone.max'     => 'حقل رقم الهاتف لا يمكن أن يزيد عن 10 أرقام.',
            'topic.required'=> 'حقل الرسالة مطلوب.',
            'topic.string'  => 'حقل الرسالة يجب أن يكون نصًا.',
        ];

        // 1️⃣ التحقق من البيانات
    $data = $request->validate([
        'name'  => 'required|string|max:100',
        'phone' => 'required|string|max:10',
        'topic' => 'required|string',
    ]);

    Contact::create($data);

    // جلب الرقم الحقيقي من النظام
    $hotelPhone = Setting::where('key', 'phone')->first()->value ?? '218924843695';

    $whatsAppText = "طلب جديد من موقع الفندق\n\n" .
                    "الاسم: {$data['name']}\n" .
                    "الهاتف: {$data['phone']}\n" .
                    "الرسالة: {$data['topic']}";

    return response()->json([
        'success' => true,
        'whatsapp_url' => 'https://wa.me/' . $hotelPhone . '?text=' . urlencode($whatsAppText)
    ]);

        }

    public function index()
    {
        $messages = Contact::orderBy('created_at', 'desc')->get();
        return view('admin.messages', compact('messages'));
    }

    public function destroy($id)
    {
        $msg = Contact::findOrFail($id);
        $msg->delete();
        return back()->with('success', 'تم حذف الرسالة بنجاح');
    }
}
