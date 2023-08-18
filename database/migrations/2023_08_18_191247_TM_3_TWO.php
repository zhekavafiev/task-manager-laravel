<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TM3TWO extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (
            Schema::hasTable('users')
            && !Schema::hasColumns('users', ['phone', 'telegram', 'github'])
        ) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('phone')->nullable(true)->default(null);
                $table->string('telegram')->nullable(true)->default(null);
                $table->string('github')->nullable(true)->default(null);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
