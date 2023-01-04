<?php

namespace ClickSuite\LaravelContactForm;

use ClickSuite\LaravelContactForm\Contracts\FormContract;
use ClickSuite\LaravelContactForm\Mail\NewFormEntry;
use ClickSuite\LaravelContactForm\Models\ContactFormEntry;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use ReflectionClass;

class Form implements FormContract
{
    protected $route = null;

    /**
     * An array of email addresses who should recieve a notification
     *
     * @var array
     */
    protected $mailTo = ['test@example.com'];

    public function handleSuccess(ContactFormEntry $entry)
    {
        Mail::to($this->mailTo)->send(new NewFormEntry($entry));
    }

    public function route()
    {
        if (!empty($this->route)) {
            return $this->route;
        }
        $reflect = new ReflectionClass($this);
        return Str::snake($reflect->getShortName(), '-');
    }

    public function fields()
    {
        return [];
    }
}
