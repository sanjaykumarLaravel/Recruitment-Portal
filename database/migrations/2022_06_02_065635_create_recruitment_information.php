<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecruitmentInformation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recruitment_information', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->date('date_of_request');
            $table->date('position_required_by_date');
            $table->string('positions');
            $table->string('years_of_experience');
            $table->string('designation');
            $table->string('department');
            $table->text('job_description');
            $table->text('mandatory_skills');
            $table->text('location');
            $table->text('selection_process');
            $table->text('special_instructions');
            $table->text('feedback')->nullable();
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
        Schema::dropIfExists('recruitment_information');
    }
}
