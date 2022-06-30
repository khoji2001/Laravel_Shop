<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('related_course_pivot', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('post_id')->nullable();
            $table->unsignedBigInteger('related_id')->nullable();
            $table->timestamps();
            
            $table->foreign('related_id')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('post_id')->references('id')->on('courses')->onDelete('cascade');
            

        });
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
};
