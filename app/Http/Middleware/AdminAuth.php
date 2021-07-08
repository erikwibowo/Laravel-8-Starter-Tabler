<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (empty(session('login'))) {
            session()->flash('type', 'error');
            session()->flash('notif', 'Anda harus login untuk mengakses halaman ini');
            return redirect(route('admin.login'));
        }

        if (session('level') != 'Admin') {
            session()->flash('type', 'error');
            session()->flash('notif', 'Anda tidak mempunyai akses untuk mengakses halaman ini');
            echo "<script>history.back</script>";
        }
        return $next($request);
    }
}
