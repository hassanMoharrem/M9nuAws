<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advantage;
use App\Models\Slider;
use App\Models\Step;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class DashboardController extends Controller
{
    public function index()
    {
        $slider = Slider::query()->where('visible','=',1)->limit(1)->get();
        $advantage = Advantage::query()->where('visible','=',1)->limit(6)->get();
        $step = Step::query()->where('visible','=',1)->limit(3)->get();
        $menuUrl = url('/');
        // Generate QR Code
        $qrCode = QrCode::size(200)->generate($menuUrl);
        return view('user.site',
            ['advantage'=>$advantage,'step'=>$step,'slider'=>$slider,'qrCode'=>$qrCode]
        );

    }

}
