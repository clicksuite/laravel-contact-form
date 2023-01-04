<?php

namespace ClickSuite\LaravelContactForm\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactFormEntry extends Model
{
    use HasFactory;

    protected $fillable = ['form_class'];

    public function formEntryFields()
    {
        return $this->hasMany(ContactFormEntryField::class);
    }
}
