<?php

namespace App\Http\Livewire\Dashboard;

use App\Invoice;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Invoices extends Component
{
    use WithPagination, AuthorizesRequests;

    protected $updatesQueryString = [
        'page' => ['except' => 1]
    ];

    public function mount()
    {
        $this->fill(request()->only('page'));
    }

    public function render()
    {
        /* Obtiene el usuario actualmente autenticado */
        $user = Auth::user();

        /* Verifica si el usuario tiene la facultad de ver cualquier recibo */
        if ($user->can('viewAny', Invoice::class)) {
            /* Si tiene la facultad de ver cualquier recibo, muestra la lista completa de recibos */
            $invoices = Invoice::query();
        } else {
            /* Si no tiene la facultad necesaria, solo se muestran los recibos del mismo usuario */
            $invoices = $user->invoices();
        }

        return view('livewire.dashboard.invoices', [
            'invoices' => $invoices->paginate(10)
        ]);
    }
}
