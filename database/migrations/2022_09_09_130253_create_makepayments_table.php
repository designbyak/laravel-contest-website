<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMakepaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('makepayments', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('ip_address');
            $table->string('contest_id');
            $table->string('contestant_id');
            $table->string('numVotes');
            $table->string('reference');
            $table->string('phone');
            $table->string('email');
            $table->string('currency');
            $table->string('payment_id');
            $table->string('status');
            $table->string('domain');
            $table->string('paystackreference');
            $table->string('amount');
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
        Schema::dropIfExists('makepayments');
    }
}
