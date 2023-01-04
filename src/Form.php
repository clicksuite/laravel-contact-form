<?php

namespace ClickSuite\LaravelContactForm;

use ClickSuite\LaravelContactForm\Mail\NewFormEntry;
use ClickSuite\LaravelContactForm\Models\ContactFormEntry;
use Illuminate\Support\Facades\Mail;

class Form
{
    public function handleSuccess(ContactFormEntry $entry)
    {
        Mail::to(['test@example.com'])->send(new NewFormEntry($entry));
    }
}
