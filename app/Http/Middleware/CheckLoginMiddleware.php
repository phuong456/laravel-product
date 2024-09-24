<?php
namespace App\Http\Middleware;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Closure;

class CheckLoginMiddleware
{
    public function handle($request, Closure $next):Response
    {
        if ($request->session()->has('user')) {
            return $next($request);
        }
        return redirect('login');
    }
}
?>