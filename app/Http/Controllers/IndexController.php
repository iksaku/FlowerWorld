<?php

namespace App\Http\Controllers;

use App\Shop;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(): View
    {
        return view('index', [
            'shops' => Shop::all()
        ]);
    }
}
