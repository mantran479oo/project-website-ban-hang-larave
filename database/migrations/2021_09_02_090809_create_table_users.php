<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('full_name',255)->collation('utf8_unicode_ci');
            $table->string('email',255)->collation('utf8_unicode_ci');
            $table->string('password',255)->collation('utf8_unicode_ci');
            $table->integer('phone');
            $table->string('address',255)->collation('utf8_unicode_ci');
            $table->string('remember_token',255)->collation('utf8_unicode_ci');
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
        Schema::dropIfExists('users');
    }
}
