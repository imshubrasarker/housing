<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaynasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baynas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('donor_name')->nullable();
            $table->double('land_volume')->nullable();
            $table->string('stain_number')->nullable();
            $table->string('ledger')->nullable();
            $table->double('shotok_price')->nullable();
            $table->double('total_price')->nullable();
            $table->double('paid_amount')->nullable();
            $table->double('deu_amount')->nullable();
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
        Schema::dropIfExists('baynas');
    }
}
