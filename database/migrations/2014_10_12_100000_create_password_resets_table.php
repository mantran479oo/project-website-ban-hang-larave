<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasswordResetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('information_website', function (Blueprint $table) {
            $table->id();
            $table->string('wards',255);
            $table->string('dstrict',255);
            $table->string('city',255);
            $table->integer('phone');
            $table->string('feedback',255);
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::dropIfExists('information_website');
    }
}
