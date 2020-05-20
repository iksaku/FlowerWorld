<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    /** @var string */
    public $email = '';

    /** @var string */
    public $password = '';

    /** @var bool */
    public $remember = true;

    public function authenticate()
    {
        /* Verifica que los datos son válidos */
        $credentials = $this->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email' => 'Por favor ingresa un email valido.',
            'password' => 'Por favor ingresa la contrasena.'
        ]);

        /* Autentica al cliente con su email y contraseña */
        if (!Auth::attempt($credentials, $this->remember)) {
            $this->addError('email', trans('auth.failed'));

            return;
        }

        /* Redirecciona al inicio */
        redirect(route('index'));
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
