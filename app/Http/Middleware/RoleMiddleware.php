<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
class RoleMiddleware { public function handle(Request $request, Closure $next, ...$roles): Response { if (!$request->user() || !in_array($request->user()->role,$roles,true)) abort(403,'Você não possui permissão para acessar esta área.'); return $next($request); } }
