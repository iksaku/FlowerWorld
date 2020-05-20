<?php

namespace App\Http\Livewire\Auth;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{
    /** @var string */
    public $name = '';

    /** @var string */
    public $email = '';

    /** @var string */
    public $address = '';

    /** @var string */
    public $password = '';

    /** @var string */
    public $passwordConfirmation = '';

    public function register()
    {
        /* Verifica que los datos son válidos */
        $this->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'address' => ['required'],
            'password' => ['required', 'min:8', 'same:passwordConfirmation'],
        ]);

        /* Crea un nuevo usuario con los nuevos datos */
        /** @var User $user */
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'address' => $this->address,
            'password' => Hash::make($this->password),
        ]);

        /* Autentica con el nuevo usuario creado */
        Auth::login($user, true);

        /* Redirecciona al inicio */
        redirect(route('index'));
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
