<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactFormEntryFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_form_entry_fields', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contact_form_entry_id')->constrained();
            $table->string('form_field')->constrained();
            $table->string('value', 10000)->nullable();
            $table->boolean('checked')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_form_entry_fields');
    }
}
