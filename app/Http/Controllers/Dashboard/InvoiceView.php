<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Invoice;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Money\Money;

class InvoiceView extends Controller
{
    public function __invoke(Invoice $invoice)
    {
        /* Verifica que el usuario puede ver este recibo */
        $this->authorize('view', $invoice);

        /* Agrupa los Productos comprado por Tienda en la que se compró */
        $groupedProducts = $invoice->products->groupBy(function (Product $product) {
            return $product->shop_id;
        });

        /* Obtiene el total del recibo */
        $subtotal = Money::MXN(0);

        foreach ($invoice->products as $product) {
            $quantity = $product->pivot->quantity;
            $subtotal = $subtotal->add($product->price->multiply($quantity));
        }

        return view('dashboard.invoice.invoice', compact('invoice', 'groupedProducts', 'subtotal'));
    }
}
