<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepositsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deposits', function (Blueprint $table) {
            $table->idcolumn();
            $table->foreignIdFor(\App\Models\Deposit::class, 'deposit_id');
            $table->foreignIdFor(\App\Models\User::class, 'receiver_id');
            $table->foreignIdFor(\App\Models\Exchange::class, 'exchange_id');
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
        Schema::dropIfExists('deposits');
    }
}
