<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        // Insert some stuff
        DB::table('roles')->insert(
            array(
                [
                    'name' => 'Management',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'Manager',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'HR',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
            )
        );

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
