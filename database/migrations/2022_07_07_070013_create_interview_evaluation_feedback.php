<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterviewEvaluationFeedback extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interview_evaluation_feedback', function (Blueprint $table) {
            $table->id();
            $table->integer('interview_evaluation_id');
            $table->integer('interviewer_id');
            $table->string('technological_skills')->nullable();
            $table->string('comments')->nullable();
            $table->string('candidate_attitude')->nullable();
            $table->string('result')->nullable();
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
        Schema::dropIfExists('interview_evaluation_feedback');
    }
}
