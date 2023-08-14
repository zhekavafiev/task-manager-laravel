<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TM2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('team')) {
            Schema::create('team', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name')->nullable(false);
                $table->string('components')->nullable(true)->default(null);
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('team_user')) {
            Schema::create('team_user', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('user_id')->nullable(false);
                $table->foreign('user_id', 't_u_user_id_fk')->references('id')->on('user');
                $table->unsignedInteger('team_id')->nullable(false);
                $table->foreign('team_id', 't_u_team_id_fk')->references('id')->on('team');
                $table->unique(['user_id', 'team_id']);
            });
        }

        if (!Schema::hasColumn('tasks', 'team_id')) {
            Schema::table('tasks', function (Blueprint $table) {
                $table->unsignedInteger('team_id')->nullable(false);
                $table->foreign('team_id')->references('id')->on('team');
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
