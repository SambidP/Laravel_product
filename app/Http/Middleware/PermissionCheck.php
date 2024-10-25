<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;


class PermissionCheck
{
    public function handle(Request $request, Closure $next, $permission=null):Response
    {
        $user =Auth::user();

        foreach ($user->roles as $role) {
            if ($role->hasPermissions($permission)) {
                return $next($request);
            }
        }
        return redirect()->back()->with('error', 'Unauthorized action.');
    }
}
