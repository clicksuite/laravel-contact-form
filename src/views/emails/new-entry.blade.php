<div>
    ID: {{ $formEntry->id }}
</div>
@foreach ($formEntry->formEntryFields as $field)
<div>
    {{$field->form_field ? $field->form_field : 'Unnamed field'}}:
    @if (is_null($field->checked))
    {{ !empty($field->value) ? $field->value : '(Empty)' }}
    @else
    {{ $field->checked ? 'Checked' : 'Unchecked' }}
    @endif
</div>
@endforeach
