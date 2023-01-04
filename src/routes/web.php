<?php

use ClickSuite\LaravelContactForm\Controllers\LaravelContactFormController;
use ClickSuite\LaravelContactForm\LaravelContactForm;
use Illuminate\Support\Facades\Route;

$forms = app()->make(LaravelContactForm::class);

$forms = $forms->forms();

foreach ($forms as $form) {
    Route::get('form/' . $form->route(), [LaravelContactFormController::class, 'show']);
    Route::post('form/' . $form->route(), [LaravelContactFormController::class, 'create']);
}
