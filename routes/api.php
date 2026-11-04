<?php

use App\Http\Controllers\Api\PagamentoController;
use Illuminate\Support\Facades\Route;

Route::apiResource('pagamentos', PagamentoController::class);
