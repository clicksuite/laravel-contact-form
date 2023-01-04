<?php

namespace ClickSuite\LaravelContactForm\Contracts;

use ClickSuite\LaravelContactForm\Models\ContactFormEntry;

interface FormContract
{
    public function route();

    public function handleSuccess(ContactFormEntry $entry);

    public function fields();
}
