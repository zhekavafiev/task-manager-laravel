<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TM1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('user_role')) {
            Schema::create('user_role', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name')->nullable(false);
            });

            $data = [
                [
                    'id' => 1,
                    'name' => 'admin',
                ],
                [
                    'id' => 2,
                    'name' => 'user',
                ]
            ];

            \DB::table('user_role')->insert($data);
            if (!Schema::hasColumn('users', 'user_role_id')) {
                Schema::table('users', function (Blueprint $table) {
                    $table->unsignedInteger('user_role_id')->nullable(false)->default(2);
                    $table->foreign('user_role_id')->references('id')->on('user_role');
                });
            }

        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
