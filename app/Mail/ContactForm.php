<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;

class ContactForm extends Mailable implements ShouldQueue
{
  use Queueable;

  public $data;

  /**
   * Create a new message instance.
   *
   * @return void
   */
  public function __construct($data)
  {
    $this->data = $data;
  }

  /**
   * Build the message.
   *
   * @return $this
   */
  public function build()
  {
    return $this->to('info@vijeshdatt.com')->from($this->data->email, $this->data->name)->subject($this->data->subject)->markdown('email.contactform');
  }
}
