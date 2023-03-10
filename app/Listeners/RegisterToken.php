<?php

namespace App\Listeners;

use App\Mail\SendTokenTwoFactor;
use App\Models\TwoFactor;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class RegisterToken
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {

        $twoFactor = TwoFactor::where('user_id', auth()->user()->id)->where('date_expired' ,'>', Carbon::now())->where('state','pending')->first();

        if (!$twoFactor) {
            $twoFactor = TwoFactor::create([
                'user_id' => $event->user->id,
                'token' => $event->user->generateToken(),
                'date_expired' => Carbon::now()->addMinutes(30),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }



        Mail::to($event->user->email)->send(new SendTokenTwoFactor($twoFactor, $event->user));
    }
}
