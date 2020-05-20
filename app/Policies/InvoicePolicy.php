<?php

namespace App\Policies;

use App\Invoice;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class InvoicePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        /* Si el usuario tiene rango de administrador, permite ver cualquier recibo */
        if ($user->is_admin) {
            return true;
        }

        /* Si no es administrador, entonces permitir que se verifique si el recibo le pertenece */
        return null;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param Invoice $invoice
     * @return mixed
     */
    public function view(User $user, Invoice $invoice)
    {
        /* Se permitirá ver el recibo si le pertenece al usuario en cuestión */
        return $invoice->user->is($user);
    }
}
