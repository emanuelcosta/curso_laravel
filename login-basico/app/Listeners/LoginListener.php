<?php

namespace App\Listeners;

use App\Mail\NovoAcesso;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Mail;
class LoginListener
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
    public function handle(Login $event)
    {
       info(sprintf("Usuário %s com email %s Logou!!", $event->user->name, $event->user->email));
       // user, users[], email
        Mail::to($event->user)
            ->send(new NovoAcesso($event->user));
    }
}
