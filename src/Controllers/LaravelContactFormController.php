<?php

namespace ClickSuite\LaravelContactForm\Controllers;

use ClickSuite\LaravelContactForm\LaravelContactForm;
use ClickSuite\LaravelContactForm\Models\ContactFormEntry;
use ClickSuite\LaravelContactForm\Models\FormEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LaravelContactFormController
{
    public function show(LaravelContactForm $cf, Request $request)
    {
        $form = $cf->getForm(explode('/', $request->path())[1]);

        return [
            'fields' => array_keys($form->fields())
        ];
    }

    public function create(LaravelContactForm $cf, Request $request)
    {
        $form = $cf->getForm(explode('/', $request->path())[1]);

        $validator = Validator::make($request->all(), $form->fields());

        $request->validate($form->fields());

        $entry = ContactFormEntry::create(
            [
                'form_class' => get_class($form)
            ]
        );

        foreach ($form->fields() as $fieldKey => $field) {
            $fieldEntry = $entry->formEntryFields()->create([
                'form_field' => $fieldKey
            ]);

            $value = $request->input($fieldKey);

            $rules = $validator->getRules();

            if (in_array('boolean', $rules[$fieldKey])) {
                $fieldEntry->checked = $value;
            } else {
                $fieldEntry->value = $value;
            }
            $fieldEntry->save();
        }


        $form->handleSuccess($entry);

        return true;
    }
}
