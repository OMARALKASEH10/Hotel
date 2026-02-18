<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\ContactMessage;
use App\Models\Giveaway;
use App\Models\GiveawayCampaign;
use App\Models\GiveawayEntry;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // الإحصائيات العامة
        $usersCount = User::count();
        $messagesCount = Contact::count();
        $entriesCount = Giveaway::count(); // عدد المشاركين فقط

        // آخر 5 مستخدمين
        $latestUsers = User::orderBy('created_at', 'desc')->take(5)->get();

        // آخر 5 رسائل
        $latestMessages = Contact::orderBy('created_at', 'desc')->take(5)->get();

        // آخر 5 مشاركين في السحب
        $latestEntries = Giveaway::orderBy('created_at', 'desc')->take(5)->get();

        $phone = Setting::get('phone', '218924843695'); // الرقم من الإعدادات

        return view('admin.dashboard', compact(
            'usersCount',
            'messagesCount',
            'entriesCount',
            'latestUsers',
            'latestMessages',
            'latestEntries', // ✅ نرسل المشاركين للعرض في الجدول
            'phone',
        ));
    }
}
