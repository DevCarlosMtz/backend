<?php

namespace App\Mail\Auth;

use App\Models\Usuarios;
use App\Models\verifiedEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

class Licenses extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $usuario, $token, $idEncrypted;

    public function __construct(Usuarios $usuario)
    {
        $this->usuario = $usuario;
        $this->subject = "Registro " . config('app.name');
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $usuario = verifiedEmail::query()
            ->where('email', $this->usuario->email)
            ->first();
        if ($usuario) {
            $this->token = $usuario->token;
        } else {
            $crear_token = verifiedEmail::create([
                'email' => $this->usuario->email,
                'token' => Str::random(8)
            ]);
            $this->token = $crear_token->token;
        }
        return $this->markdown('mails.licenses');
    }
}
