<?php

namespace App\Http\Controllers;

use App\Shop;
use Illuminate\Http\Request;

class ShopView extends Controller
{
    public function __invoke(Shop $shop)
    {
        return view('shop', compact('shop'));
    }
}
