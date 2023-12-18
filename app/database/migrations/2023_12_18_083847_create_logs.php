<?php

use Leaf\Schema;
use Leaf\Database;
use Illuminate\Database\Schema\Blueprint;

class CreateLogs extends Database
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        if (!static::$capsule::schema()->hasTable('logs')) :
            static::$capsule::schema()->create('logs', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('variable_id');
                $table->index('variable_id');
                $table->foreign('variable_id')->references('id')->on('variables')->onDelete('cascade');
                $table->integer('v_integer')->nullable();
                $table->double('v_double')->nullable();
                $table->string('v_string')->nullable();
                $table->timestamps();
            });
        endif;

        // you can now build your migrations with schemas.
        // see: https://leafphp.dev/docs/mvc/schema.html
        // Schema::build('logs');
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        static::$capsule::schema()->dropIfExists('logs');
    }
}
