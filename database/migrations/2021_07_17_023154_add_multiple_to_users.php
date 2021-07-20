<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMultipleToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('image_id')->nullable()->index();
            $table->string('phone')->nullable();
            $table->string('about')->nullable();
            $table->string('paypal')->nullable();
            $table->string('venmo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('image_id');
            $table->dropColumn('phone');
            $table->dropColumn('about');
            $table->dropColumn('paypal');
            $table->dropColumn('venmo');
        });
    }
}
