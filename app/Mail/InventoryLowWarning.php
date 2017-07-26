<?php

namespace App\Mail;

use App\Paint;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class InventoryLowWarning extends Mailable
{
    use Queueable, SerializesModels;

    public $paint;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Paint $paint)
    {
        $this->paint = $paint;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.inventoryLowWarning');
    }
}
