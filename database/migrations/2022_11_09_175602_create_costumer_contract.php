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
        Schema::create('costumer_contract', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->constrained()->onDelete('cascade');
            $table->date('valid_from');
            $table->date('valid_to');
            $table->double('prepayment');
            $table->double('monthly_payment');
            $table->integer('user_quantity');
            $table->longText('note');
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
        Schema::dropIfExists('costumer_contract');
    }
};