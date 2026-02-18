<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class mainpageController extends Controller
{
public function showhotel()
{
    $data = [
        'title' => 'منتجاتنا',
        'subtitle' => 'استكشف مجموعتنا المتنوعة من المنتجات والحلول في مجال الطاقة المتجددة. من الطاقة الشمسية إلى طاقة الرياح وأكثر، نقدم تقنيات حديثة وفعالة لتلبية احتياجاتك الطاقوية بطرق صديقة للبيئة.',
        'bg_image' => 'https://images.unsplash.com/photo-1509391366360-fe5bb58583bb?q=80&w=2070', // صورة ألواح شمسية
        'nav_links' => ['الرئيسية', 'من نحن', 'خدماتنا', 'لماذا تختارنا', 'شركاؤنا', 'اتصل بنا']
    ];

    return view('MainPageBooking', compact('data'));
}
}
