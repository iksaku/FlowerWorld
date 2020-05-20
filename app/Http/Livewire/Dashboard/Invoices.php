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
        $user = Auth::user();

        if ($user->can('viewAny', Invoice::class)) {
            $invoices = Invoice::query();
        } else {
            $invoices = $user->invoices();
        }

        return view('livewire.dashboard.invoices', [
            'invoices' => $invoices->paginate(10)
        ]);
    }
}
