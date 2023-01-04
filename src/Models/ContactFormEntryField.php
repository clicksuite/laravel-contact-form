<?php

namespace ClickSuite\LaravelContactForm\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactFormEntryField extends Model
{
    use HasFactory;

    protected $fillable = ['form_field_id', 'value', 'checked', 'form_field'];

    public function formEntry()
    {
        return $this->belongsTo(ContactFormEntry::class);
    }
}
