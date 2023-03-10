<?php

namespace App\Listeners;

use App\Models\TwoFactor;

use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ValidateTwoFactor
{
    /**
     * Create the event listener.
     *
     * @return void
     */


    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {

        $now = Carbon::now();

        $twoFactor = TwoFactor::where('user_id', $event->user->id)->where('state', 'pending')->first();


    }
}
