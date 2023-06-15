<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contests', function (Blueprint $table) {
            $table->id();
            $table->string('contest_name');
            $table->string('contact_email');
            $table->string('contact_num');
            $table->string('contest_type');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('vote_price');
            $table->string('contest_thumb');
            $table->string('contest_decription');
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
        Schema::dropIfExists('contests');
    }
}
