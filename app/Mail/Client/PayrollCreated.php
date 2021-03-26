<?php

namespace App\Mail\Client;

use App\Models\Client;
use App\Models\Payroll;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PayrollCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $client;

    public $payroll;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Client $client, Payroll $payroll)
    {
        $this->client = $client;
        $this->payroll = $payroll;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.clients.payroll-created');
    }
}
