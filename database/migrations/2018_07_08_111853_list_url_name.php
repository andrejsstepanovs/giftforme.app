<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ListUrlName extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('gift_lists', function (Blueprint $table) {
            $table->string('url')->nullable();
        });
        
        $lists = App\GiftList::all();
        foreach ($lists as $list) {
            $list->url = $list->id;
            $list->save();
        }
        
        Schema::table('gift_lists', function (Blueprint $table) {
            $table->unique('url');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gift_lists', function (Blueprint $table) {
            $table->dropColumn('url');
        });
    }
}
