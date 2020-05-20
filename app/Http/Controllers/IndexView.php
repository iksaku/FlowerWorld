<?php

namespace App\Http\Controllers;

use App\Shop;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class IndexView extends Controller
{
    public function __invoke(): View
    {
        /* Enlista todas las tiendas en existencia */
        return view('index', [
            'shops' => Shop::all()
        ]);
    }
}
