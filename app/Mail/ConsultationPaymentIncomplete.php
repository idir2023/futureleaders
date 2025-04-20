<?php

namespace App\Mail;

use App\Models\Consultation;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConsultationPaymentIncomplete extends Mailable
{
    use Queueable, SerializesModels;

    public $consultation;

    public function __construct(Consultation $consultation)
    {
        $this->consultation = $consultation;
    }

    public function build()
    {
        return $this->subject('Problème avec le paiement')
                    ->markdown('emails.consultation.payment_incomplete');
    }
}
