<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\delivery;

class PickupDate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $DID = $request->input('DID');
        $delivery = delivery::where('DID', $DID)->first();
        if ($delivery->pickup_date !== null && $delivery->time !== 'Pending') {
            return redirect()->back()->with('error', 'Pickup has already been scheduled!');
        }
        return $next($request);
    }
}
