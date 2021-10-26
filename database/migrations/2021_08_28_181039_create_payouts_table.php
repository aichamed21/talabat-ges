<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payouts', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\User::class, 'payer_id');
            $table->foreignIdFor(\App\Models\User::class, 'receiver_id');
            $table->string('beneficiary_name');
            $table->decimal('amount');
            $table->foreignIdFor(\App\Models\Currency::class, 'currency_id');
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
        Schema::dropIfExists('payouts');
    }
}
