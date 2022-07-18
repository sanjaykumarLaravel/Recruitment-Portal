<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InterviewEvaluation extends Model
{
    use HasFactory;
    protected $table = 'interview_evaluation';
    protected $fillable = ['*'];
}
