<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class Logout extends Controller
{
    public function __invoke(): RedirectResponse
    {
        /* Cierra sesión del usuario */
        Auth::logout();

        return redirect(route('index'));
    }
}
