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
        Schema::create('applicants_bio_data', function (Blueprint $table) {
            $table->id();
            $table->string('application_number');
            $table->string('address_1');
            $table->string('city_1');
            $table->string('address_2')->nullable();
            $table->string('city_2')->nullable();
            $table->string('state_residence');
            $table->string('country_residence');
            $table->string('lga_residence');
            $table->string('state_origin');
            $table->string('country_origin');
            $table->string('lga_origin');
            $table->date('dob');
            $table->string('nok_first_name');
            $table->string('nok_last_name');
            $table->string('nok_address');
            $table->string('nok_city');
            $table->string('nok_country');
            $table->string('nok_state');
            $table->string('nok_lga');
            $table->string('nok_phone');
            $table->string('nok_email');
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
        Schema::dropIfExists('applicants_bio_data');
    }
};
