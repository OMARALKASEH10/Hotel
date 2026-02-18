<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function edit()
    {
        $phone = Setting::get('phone', '218924843695');

        // قراءة الأيام
        $working_days = Setting::get('working_days', 'السبت-الأربعاء');
        $days = explode('-', $working_days);
        $day_from = $days[0] ?? 'السبت';
        $day_to = $days[1] ?? 'الأربعاء';

        // قراءة الوقت
        $working_hours = Setting::get('working_hours', '08:00-17:00');
        $times = explode('-', $working_hours);
        $time_from_24 = $times[0] ?? '08:00';
        $time_to_24 = $times[1] ?? '17:00';

        // تحويل الوقت لنظام 12 ساعة
        $start = date("g:i A", strtotime($time_from_24));
        $end = date("g:i A", strtotime($time_to_24));

        // دمج الأيام مع الوقت
        $full_working_schedule = "$day_from - $day_to: $start - $end";

        return view('admin.editPhoneNumber', compact(
            'phone', 'day_from', 'day_to',
            'start', 'end',
            'full_working_schedule',
            'time_from_24', 'time_to_24'
        ));
    }


    public function update(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            'day_from' => 'required',
            'day_to' => 'required',
            'time_from_hour' => 'required',
            'time_from_minute' => 'required',
            'time_from_ampm' => 'required',
            'time_to_hour' => 'required',
            'time_to_minute' => 'required',
            'time_to_ampm' => 'required',
        ]);


        $time_from_hour = $request->time_from_hour;
        $time_from_minute = $request->time_from_minute;
        $time_from_ampm = $request->time_from_ampm;

        $time_to_hour = $request->time_to_hour;
        $time_to_minute = $request->time_to_minute;
        $time_to_ampm = $request->time_to_ampm;

        // تحويل الوقت لنظام 24 ساعة
        $time_from = date("H:i", strtotime("$time_from_hour:$time_from_minute $time_from_ampm"));
        $time_to = date("H:i", strtotime("$time_to_hour:$time_to_minute $time_to_ampm"));

        $working_hours = $time_from . '-' . $time_to;

        Setting::updateOrCreate(['key' => 'phone'], ['value' => $request->phone]);
        Setting::updateOrCreate(['key' => 'working_days'], ['value' => $request->day_from . '-' . $request->day_to]);
        Setting::updateOrCreate(['key' => 'working_hours'], ['value' => $working_hours]);




        return back()->with('success', 'تم حفظ الإعدادات بنجاح!');
    }
}
