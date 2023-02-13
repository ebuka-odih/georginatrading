<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepositTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deposits', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->dateTime('approved_date')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->decimal('amount', 7)->nullable();
            $table->bigInteger('payment_method_id');
            $table->bigInteger('investment_plans_id')->nullable();
            $table->string('hash_code')->nullable();
            $table->integer('status')->nullable()->default(0);
            $table->string('payment_proof')->nullable(); //image of payment proof
            $table->boolean('completed')->default(false);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deposits');
    }
}
