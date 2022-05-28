<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderShipped extends Mailable {

    use Queueable, SerializesModels;

    public $alert;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($alert) {
        $this->alert = $alert;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
        return $this->from('sender@example.com')
                    ->view('mail.alert')
                    ->with(
                      [
                            'testVarOne' => '1',
                            'testVarTwo' => '2',
                      ]);
    }

}
