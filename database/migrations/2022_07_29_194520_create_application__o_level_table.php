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
        Schema::create('application__o_level', function (Blueprint $table) {
            $table->id();
            $table->integer('application_id');
            $table->string('subject');
            $table->string('grade');
            $table->string('examination');
            $table->string('sitting');
            $table->year('year');
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
        Schema::dropIfExists('application__o_level');
    }
};
