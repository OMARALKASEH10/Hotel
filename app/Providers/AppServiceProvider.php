<?php

namespace App\Providers;

use App\Models\Contact;
use App\Models\Giveaway;
use App\Models\GiveawayCampaign;
use App\Models\Setting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public const HOME = '/home';

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $entries = Giveaway::latest()->get();
        $campaigns = GiveawayCampaign::where('draw_done', false)
            ->where('end_date', '>=', now())
            ->orderBy('start_date', 'asc')
            ->get();

        $campaign = $campaigns->first(); // مثلا الحملة الحالية أو المختارة
        $entries = $campaign ? Giveaway::where('campaign_id', $campaign->id)->latest()->get() : collect();

        $phone = Setting::get('phone', '218924843695');
        $working_days = Setting::get('working_days', 'السبت-الأربعاء'); // مثال افتراضي
        $working_hours = Setting::get('working_hours', '08:00-17:00'); // افتراضي

        // تحويل الوقت من 24 ساعة إلى 12 ساعة
        $hours = explode('-', $working_hours);
        $start = date("g:i A", strtotime($hours[0]));
        $end = date("g:i A", strtotime($hours[1]));
        $formatted_hours = $start . ' - ' . $end;

        // إعداد القيمة النهائية للعرض: الأيام + الوقت
        $working_schedule = $working_days . ' : ' . $formatted_hours;

        $messagesCount = Contact::count();


        $phone = Setting::get('phone', '218924843695');

        $working_days = Setting::get('working_days', 'السبت-الأربعاء');
        $days = explode('-', $working_days);
        $day_from = $days[0] ?? 'السبت';
        $day_to = $days[1] ?? 'الأربعاء';

        $working_hours = Setting::get('working_hours', '08:00-17:00');
        $times = explode('-', $working_hours);
        $time_from_24 = $times[0] ?? '08:00';
        $time_to_24 = $times[1] ?? '17:00';

        $start = date("g:i A", strtotime($time_from_24));
        $end = date("g:i A", strtotime($time_to_24));

        $full_working_schedule = "$day_from - $day_to: $start - $end";

        $time_from_hour   = (int) date("g", strtotime($time_from_24));
        $time_from_minute = (int) date("i", strtotime($time_from_24));
        $time_from_ampm   = date("A", strtotime($time_from_24));

        $time_to_hour     = (int) date("g", strtotime($time_to_24));
        $time_to_minute   = (int) date("i", strtotime($time_to_24));
        $time_to_ampm     = date("A", strtotime($time_to_24));

        

        View::share([
            'phone' => $phone,
            'working_hours' => $formatted_hours,
            'working_days' => $working_days,
            'working_schedule' => $working_schedule,
            'entries' => $entries,
            'campaigns' => $campaigns,
            'campaign' => $campaign,
            'messagesCount' => $messagesCount,
            'full_working_schedule' => $full_working_schedule,
            'time_from_hour' => $time_from_hour,
            'time_from_minute' => $time_from_minute,
            'time_from_ampm' => $time_from_ampm,
            'time_to_hour' => $time_to_hour,
            'time_to_minute' => $time_to_minute,
            'time_to_ampm' => $time_to_ampm,
        ]);
        

    }
}
