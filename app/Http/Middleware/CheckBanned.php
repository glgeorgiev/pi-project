<?php

namespace App\Http\Middleware;

use App\BanIp;
use App\BanUser;
use Auth;
use DateTime;
use Closure;

class CheckBanned
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $banUser = BanUser::where('user_id', Auth::id())->where(function($q) {
            $q->whereNull('until')->orWhere('until', '>', new DateTime());
        })->first();

        if ($banUser instanceof BanUser) {
            return response()->json([
                'result'    => 'error',
                'message'   => 'Не можете да коментирате, тъй като имате активен бан!' .
                    ($banUser->until ? (' Банът Ви изтича на ' . $banUser->until->format('d.m.Y')) : '')
            ], 403);
        }

        $banIp = BanIp::where('ip', ip2long($request->getClientIp()))->where(function($q) {
            $q->whereNull('until')->orWhere('until', '>', new DateTime());
        })->first();

        if ($banIp instanceof BanIp) {
            return response()->json([
                'result'    => 'error',
                'message'   => 'Не можете да коментирате, тъй като имате активен бан!' .
                    ($banUser->until ? (' Банът Ви изтича на ' . $banIp->until->format('d.m.Y')) : '')
            ], 403);
        }

        return $next($request);
    }
}
