<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InterviewEvaluationFeedback extends Model
{
    use HasFactory;
    protected $table = 'interview_evaluation_feedback';
    protected $fillable = ['*'];

    public function VerifiedUsersInformation()
	{
	    return $this->hasOne(Interviewer::class,'emp_id','interviewer_id');
	}
}
