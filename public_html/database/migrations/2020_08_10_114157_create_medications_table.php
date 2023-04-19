<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medications', function (Blueprint $table) {
            $table->id();/* 
            $table->bigint('user_id'); */
            $table->date('date_given');
            $table->string('medication');
            $table->string('daterange');
            $table->string('dosage');
            $table->string('form');
            $table->string('frequency');
            $table->string('directions');
            $table->string('reason');
            $table->string('use');
            $table->text('note');
            $table->boolean('status')->default(false);
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
        Schema::dropIfExists('medications');
    }
}
