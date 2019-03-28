<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userinfo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('company_id');
            $table->string('userinfo_name');
            $table->string('userinfo_address');
            $table->string('userinfo_phonenumber');
            $table->timestamps();

            $table->foreign('user_id','user_id')
                ->references('id')->on('users')->onDelete('cascade');

            $table->foreign('company_id','company_id')
                ->references('id')->on('company')->onDelete('cascade');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('userinfo', function(Blueprint $table)
        {
            $table->dropForeign('user_id');
            $table->dropForeign('company_id');
        });

        Schema::dropIfExists('userinfo');
    }
}
