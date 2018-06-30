<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGiftTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gifts', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('sort')->default(0);
            $table->unsignedInteger('gift_list_id');
            $table->string('name');
            $table->longText('description')->nullable();
            $table->unsignedInteger('likes')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('gift_list_id')->references('id')->on('gift_lists')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gifts');
    }
}
