<?php

namespace ClickSuite\LaravelContactForm\Mail;

use App\Models\FormEntry;
use ClickSuite\LaravelContactForm\Models\ContactFormEntry;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewFormEntry extends Mailable
{
    use Queueable, SerializesModels;

    public $formEntry;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ContactFormEntry $formEntry)
    {
        $this->formEntry = $formEntry;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('laravel-contact-form::emails.new-entry');
    }
}
