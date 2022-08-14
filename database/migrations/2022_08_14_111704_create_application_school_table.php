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
        Schema::create('application_school', function (Blueprint $table) {
            $table->id();
            $table->integer('application_id');
            $table->string('school_name');
            $table->string('reg_num')->nullable();
            $table->string('certificate');
            $table->string('institution');
            $table->year('entry_year');
            $table->year('year_graduated');
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
        Schema::dropIfExists('application_school');
    }
};
