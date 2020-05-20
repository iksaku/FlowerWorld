@extends('layouts.app')
@section('title', 'Pago Realizado')

@section('content')
    <div class="flex-grow flex flex-col items-center justify-center text-center space-y-4">
        <div>
            <span class="fas fa-check-circle fa-8x text-green-500"></span>
        </div>

        <h1 class="text-2xl font-semibold">
            ¡Su pago ha sido realizado!
        </h1>

        <p>
            En unos momentos enviaremos el recibo de compra a su email.
        </p>
    </div>
@endsection
