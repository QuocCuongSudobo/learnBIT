<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSnationalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('snationals', function (Blueprint $table) {
            $table->id();
            $table->string('month');
            $table->integer('nation');
            $table->float('value');
            $table->timestamps();
            $table->unique(['month', 'nation']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('snationals');
    }
}
