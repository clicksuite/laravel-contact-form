@component('mail::message')
# New form submission
@component('mail::table')

| Field      | Value          |
| :--------- | :------------- |
@foreach ($formEntry->formEntryFields as $field)
    | **{{$field->form_field ? $field->form_field : 'Unnamed field'}}** | @if (is_null($field->checked)) {{ !empty($field->value) ? $field->value : '(Empty)' }} @else {{ $field->checked ? 'Checked' : 'Unchecked' }} @endif |
@endforeach

@endcomponent
@component('mail::subcopy')
    **ID**: {{ $formEntry->id }}
@endcomponent
@endcomponent
