<?php

namespace ClickSuite\LaravelContactForm;

use Illuminate\Support\Facades\Http;

class LaravelContactForm
{
    public function justDoIt()
    {
        $response = Http::get('https://inspiration.goprogram.ai/');

        return $response['quote'] . ' -' . $response['author'];
    }

    public static function useContactForm(string $form)
    {
        app()->singleton($form, function ($app) use ($form) {
            return new $form();
        });
        app()->tag([$form], 'cs-contact-form');
    }

    public function forms()
    {
        return app()->tagged('cs-contact-form');
    }

    public function getForm($formName)
    {
        $forms = $this->forms();
        foreach ($forms as $form) {
            if ($form->route === $formName) {
                return $form;
            }
        }
        return null;
    }
}
