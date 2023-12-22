<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\User;

class NovoAcesso extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.novologin')->with([
            'nome' => $this->user->name,
            'email' => $this->user->email,
            'data_hora_acesso' => now()->setTimezone('America/Sao_paulo')->format('d/m/Y H:i:s')
        ])->attach(base_path().'/arquivos/arquivo.pdf');
    }
}
