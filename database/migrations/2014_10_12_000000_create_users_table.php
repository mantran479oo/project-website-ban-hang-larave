<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('products', function (Blueprint $table) {
               $table->id();
               $table->integer('id_type');
               $table->string('name',150)->collation('utf8_unicode_ci'); // cột name có kiểu là varchar và giới hạn là 150 ký tự
               $table->text('description')->collation('utf8_unicode_ci')->nullable(); // cột description có kiểu là text và có thể để NULL
               $table->float('promotion_price');
               $table->float('unit_price'); // cột price có kiểu là integer
               $table->string('unit',255)->collation('utf8_unicode_ci');
               $table->tinyInteger('new');
               $table->integer('amount');
               $table->string('image',255); // cột image có kiểu là varchar và giới hạn là 255 ký tự
               $table->timestamps(); // cột thể hiện timestamps mặc định
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::dropIfExists('products');
    }
}
