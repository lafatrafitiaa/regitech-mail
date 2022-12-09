<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailAnnulerCommande extends Mailable
{


    use Queueable, SerializesModels;

    public $details;

    public function __construct($detail)
    {
        $this->details = $detail;
    }

    public function build()
    {
        return $this->subject('Annulation des commandes')->view('Email/annulationProduit');
    }
}
