<?php

namespace App\Http\Controllers;

use App\Models\Giveaway;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class GiveawayController extends Controller
{

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'  => [
                'required',
                'string',
                'max:255',
                Rule::unique('giveaways')->where(function ($query) use ($request) {
                    return $query->where('campaign_id', $request->campaign_id);
                }),
            ],
            'phone' => [
                'required',
                'string',
                'max:10',
                'regex:/^(091|092|093|094|095)[0-9]{7}$/',
                Rule::unique('giveaways')->where(function ($query) use ($request) {
                    return $query->where('campaign_id', $request->campaign_id);
                }),
            ],
            'campaign_id' => 'required|exists:giveaway_campaigns,id',
        ], [
            'name.unique'  => 'عذرًا، هذا الاسم مسجل مسبقًا في هذه الحملة.',
            'phone.unique' => 'عذرًا، هذا الرقم مسجل مسبقًا في هذه الحملة.',
            'phone.regex'  => 'رقم الهاتف يجب أن يبدأ بـ 091, 092, 093, 094, 095 ويحتوي على 10 أرقام.'
        ]);

        Giveaway::create($validated);

        return back()->with('success', '🎉 تم تسجيلك في السحب بنجاح');
    }

        public function index()
    {
        $entries = Giveaway::orderBy('created_at', 'desc')->get();
        return view('admin.giveaway', compact('entries'));
    }

    public function edit($id)
    {
        $entry = Giveaway::findOrFail($id);
        return view('admin.editGiveaway', compact('entry'));
    }

    public function update(Request $request, $id)
    {
        $entry = Giveaway::findOrFail($id);
        $entry->update($request->validate([
            'name' => 'required|string|max:100',
            'phone' => 'required|string|max:10',
        ]));
        return redirect()->route('admin.giveaway')->with('success', 'تم تعديل المشارك بنجاح');
    }

    public function destroy($id)
    {
        $entry = Giveaway::findOrFail($id);
        $entry->delete();
        return back()->with('success', 'تم حذف المشارك بنجاح');
    }
}
