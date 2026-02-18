<?php

namespace App\Http\Controllers;

use App\Models\Giveaway;
use App\Models\GiveawayCampaign;
use Illuminate\Http\Request;

class GiveawayCampaignController extends Controller
{

    public function draw($campaign_id)
    {
        $campaign = GiveawayCampaign::findOrFail($campaign_id);

        // التحقق إذا تم السحب مسبقاً
        if($campaign->draw_done) {
            return back()->with('error', 'تم إجراء السحب مسبقاً لهذه الحملة.');
        }

        // اختيار فائز عشوائي
        $winner = $campaign->entries()->inRandomOrder()->first();

        // إيقاف الاشتراك بعد السحب
        $campaign->update(['draw_done' => true]);

        return back()->with('success', "تم السحب! الفائز: {$winner->name}");
    }

    public function index()
    {
        $campaigns = GiveawayCampaign::orderBy('start_date','desc')->get();
        return view('admin.dashboard', compact('campaigns'));
    }

    public function create()
    {
        return view('admin.giveawaycampaign.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        GiveawayCampaign::create($request->all());

        return redirect()->route('admin.dashboard')->with('success','تم إنشاء الحملة بنجاح');
    }

    public function edit($id)
    {
        $campaign = GiveawayCampaign::findOrFail($id);
        return view('admin.giveawaycampaign.form', compact('campaign'));
    }

    public function update(Request $request, $id)
    {
        $campaign = GiveawayCampaign::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'draw_done' => 'required|boolean',
        ]);

        $campaign->update($request->all());

        return redirect()->route('admin.dashboard')->with('success','تم تعديل الحملة بنجاح');
    }

    public function destroy($id)
    {
    $campaign = GiveawayCampaign::findOrFail($id);

    // حذف المشاركين المرتبطين بالحملة
    $campaign->entries()->delete();

    // ثم حذف الحملة نفسها
    $campaign->delete();
        return back()->with('success','تم حذف الحملة بنجاح');
    }

    public function showWinnerPage($campaign_id)
    {
        $campaign = GiveawayCampaign::with('winner')->findOrFail($campaign_id);

        $winner = $campaign->winner; // الآن هذا يرجع الفائز المخزن

        return view('admin.winner', compact('campaign', 'winner'));
    }

    public function executeDraw($campaign_id)
    {
        $campaign = GiveawayCampaign::with('entries')->findOrFail($campaign_id);

        if ($campaign->draw_done) {
            return back()->with('error', 'تم إجراء السحب مسبقاً');
        }

        $entries = $campaign->entries;

        if ($entries->isEmpty()) {
            return back()->with('error', 'لا يوجد مشاركين في هذه الحملة.');
        }

        // اختيار فائز عشوائي
        $winner = $entries->random();

        // حفظ الفائز فقط
        $campaign->update([
            'draw_done' => true,
            'winner_id' => $winner->id,
        ]);

        return redirect()
            ->route('admin.giveaway.draw.page', $campaign->id)
            ->with('success', "🎉 تم السحب! الفائز: {$winner->name}");

    }

    public function resetDraw($campaign_id)
    {
        $campaign = GiveawayCampaign::findOrFail($campaign_id);

        // إعادة الحالة القديمة للحملة
        $campaign->update([
            'draw_done' => false,
            'winner_id' => null,
        ]);

        // يمكن أيضاً إعادة المشاركين إذا كنت تحتفظ بهم في جدول آخر
        // أو تطلب من المشاركين إعادة التسجيل

        return back()->with('success', "تم إعادة السحب لهذه الحملة، يمكنك الآن اختيار فائز جديد.");
    }


    public function resetAndDelete($campaign_id)
    {
        $campaign = GiveawayCampaign::findOrFail($campaign_id);

        // حذف المشاركين
        $campaign->entries()->delete();

        // حذف الحملة نفسها
        $campaign->delete();

        return redirect()->route('admin.dashboard')
                        ->with('success', 'تم حذف الحملة مع المشاركين بنجاح.');
    }



}
