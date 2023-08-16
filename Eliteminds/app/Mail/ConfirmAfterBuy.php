<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ConfirmAfterBuy extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $file_path;


    public function __construct($file_path)
    {
        $this->file_path = $file_path;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('NO_REPLY_EMAIL'))->subject('Your Invoice From Elite Minds')->view('mails.invoiceafterbuy')->attach($this->file_path);
    }
}
