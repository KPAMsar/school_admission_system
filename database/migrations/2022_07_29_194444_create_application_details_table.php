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
        Schema::create('application_details', function (Blueprint $table) {
            $table->id();
            $table->string('application_number');
            $table->double('jamb_score')->nullable();
            $table->string('first_choice');
            $table->string('second_choice');
            $table->year('year_of_graduation');
            $table->string('first_sitting_olevel_result')->nullable();
            $table->string('second_sitting_olevel_result')->nullable();
            $table->string('birth_certificate')->nullable();
            $table->string('passport');
            $table->enum('status', ['Pending', 'Verified', 'Rejected', 'Screened', 'Admitted', 'Not Admitted'])->default('Pending');
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
        Schema::dropIfExists('application_details');
    }
};
