<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alls', function (Blueprint $table) {
            $table->id();
            $table->string('month');
            $table->integer('nation');
            $table->integer('pd_t');
            $table->integer('pd_id');
            $table->float('value');
            $table->timestamps();
            $table->unique(['month', 'nation', 'pd_t', 'pd_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alls');
    }
}
