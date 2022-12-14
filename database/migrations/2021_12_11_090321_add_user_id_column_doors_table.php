<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdColumnDoorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('doors', function (Blueprint $table) {
            $table->foreignId('user_id')->references('id')->on('users')->onDelete(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('doors', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
    }
}
