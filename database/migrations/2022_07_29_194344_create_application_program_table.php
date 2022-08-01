<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application_program', function (Blueprint $table) {
            $table->id();
            $table->string('degree_awarded');
            $table->string('course');
            $table->string('department');
            $table->string('faculty');
            $table->enum('status', ['Active', 'Inactive'])->default('Active');
            $table->double('duration');
            $table->string('affiliation')->nullable();
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
        Schema::dropIfExists('application_program');
    }
};
