<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verificar se o usuário está autenticado e se o email é o permitido
        if (Auth::check() && Auth::user()->email !== 'admin@qrshare.com.br') {
            abort(404, 'Página não encontrada.');
        }

        return $next($request); // Prosseguir com a requisição
    }
}
