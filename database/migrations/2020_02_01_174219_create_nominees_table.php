<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNomineesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nominees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('hus_father')->nullable();
            $table->string('address')->nullable();
            $table->string('religion')->nullable();
            $table->string('nationality')->nullable();
            $table->string('nid')->nullable();
            $table->string('picture')->nullable();
            $table->string('member_id');
            $table->string('birthday')->nullable();
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
        Schema::dropIfExists('nominees');
    }
}
