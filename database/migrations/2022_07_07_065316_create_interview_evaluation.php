<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterviewEvaluation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interview_evaluation', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->date('date_of_request');
            $table->string('candidate_name');
            $table->string('skill');
            $table->string('interviewer');
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('interview_evaluation');
    }
}
