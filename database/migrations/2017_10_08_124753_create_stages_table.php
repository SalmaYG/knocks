<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stages', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->timestamps();
          $table->string('name');
          $table->string('category');
          $table->longText('thumbnail')->nullable();
          $table->longText('cover')->nullable();
          $table->longText('picture')->nullable();
          $table->json('index')->nullable();
          $table->string('username')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stages');
    }
}
