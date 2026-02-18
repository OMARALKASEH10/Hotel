<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class hotelController extends Controller
{
    public function index()
    {
        return view('MainPageBooking'); // تأكد أن اسم الملف في folder views هو hotel.blade.php
    }
}
