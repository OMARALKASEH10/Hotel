<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GiveawayCampaignController;
use App\Http\Controllers\GiveawayController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect()->route('login'); // 👈 هنا التحويل
})->name('logout');


Route::get('/lang/{locale}', function ($locale) {
    if (! in_array($locale, ['ar', 'en'])) {
        abort(400);
    }

    session(['locale' => $locale]);

    return redirect()->back();
})->name('lang.switch');

Route::middleware(['auth','admin'])->prefix('admin')->group(function () {
    // لوحة التحكم
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');


    Route::get('/users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('/users/store', [UserController::class, 'store'])->name('admin.users.store');

    
    // المستخدمين
    Route::get('/users', [UserController::class, 'index'])->name('admin.users');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::match(['put','patch'], '/users/{id}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('admin.users.delete');

    // المشاركين في السحب
    Route::get('/giveaway', [GiveawayController::class, 'index'])->name('admin.giveaway');
    Route::get('/giveaway/{id}/edit', [GiveawayController::class, 'edit'])->name('admin.giveaway.edit');
    Route::match(['put','patch'], '/giveaway/{entry}', [GiveawayController::class, 'update'])->name('admin.giveaway.update');
    Route::delete('/giveaway/{id}', [GiveawayController::class, 'destroy'])->name('admin.giveaway.delete');
    Route::post('/giveaway', [GiveawayController::class, 'store'])->name('giveaway.store');



    Route::patch('/admin/giveaway/campaign/{campaign}/reset', [GiveawayCampaignController::class, 'resetDraw'])
    ->name('admin.giveaway.campaign.reset');


    // صفحة السحب / عرض الفائز
    Route::get(
        'campaign/{campaign}/draw',
        [GiveawayCampaignController::class, 'showWinnerPage']
    )->name('admin.giveaway.draw.page');

    // تنفيذ السحب
    Route::post(
        'campaign/{campaign}/draw',
        [GiveawayCampaignController::class, 'executeDraw']
    )->name('admin.giveaway.draw.execute');


    // رسائل الزبائن
    Route::get('/messages', [ContactController::class, 'index'])->name('admin.messages');
    Route::delete('/messages/{id}', [ContactController::class, 'destroy'])->name('admin.messages.delete');

     // صفحة الإعدادات
    Route::get('/settings', [SettingController::class, 'edit'])->name('admin.settings');
    Route::post('/settings', [SettingController::class, 'update'])->name('admin.settings.update');


    Route::patch('admin/giveaway/campaign/{campaign}/delete', [GiveawayCampaignController::class, 'resetAndDelete'])
    ->name('admin.giveaway.campaign.delete');



    Route::get('giveaway/campaign', [GiveawayCampaignController::class,'index'])->name('admin.giveaway.campaign.index');
    Route::get('giveaway/campaign/create', [GiveawayCampaignController::class,'create'])->name('admin.giveaway.campaign.create');
    Route::post('giveaway/campaign/store', [GiveawayCampaignController::class,'store'])->name('admin.giveaway.campaign.store');
    Route::get('giveaway/campaign/{id}/edit', [GiveawayCampaignController::class,'edit'])->name('admin.giveaway.campaign.edit');
    Route::put('giveaway/campaign/{id}', [GiveawayCampaignController::class,'update'])->name('admin.giveaway.campaign.update');
    Route::delete('giveaway/campaign/{id}', [GiveawayCampaignController::class,'destroy'])->name('admin.giveaway.campaign.destroy');
});


Route::get('/contact', [ContactController::class, 'create'])->name('contact.create'); // نموذج الاتصال
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');  


Route::post('/giveaway', [GiveawayController::class, 'store'])->name('giveaway.store');
