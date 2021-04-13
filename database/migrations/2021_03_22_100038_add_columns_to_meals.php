<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToMeals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('meals', function (Blueprint $table) {
            $table->boolean('special_meal')->default(0)->after('user_id');
            $table->boolean('offer')->default(0)->after('special_meal');
            $table->unsignedBigInteger('views')->default(0)->after('offer');
            $table->unsignedBigInteger('sales')->default(0)->after('views');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('meals', function (Blueprint $table) {
            $table->dropColumn('special_meal');
            $table->dropColumn('offer');
            $table->dropColumn('views');
            $table->dropColumn('sales');
        });
    }
}
