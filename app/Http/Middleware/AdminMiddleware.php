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
        if (Auth::check()) {
            $user = Auth::user();

            // Verifica se o e-mail do usuário é admin@qrshare.com.br
            if ($user->email === 'admin@qrshare.com.br') {
                return $next($request); // Se sim, continua a requisição
            }
        }

        // Alternativamente, você pode usar:
        abort(403, 'Unauthorized action.');

        // Caso o e-mail não seja permitido, redireciona ou aborta a requisição
        return redirect('/')->with('error', 'Unauthorized access.');
    }
}
