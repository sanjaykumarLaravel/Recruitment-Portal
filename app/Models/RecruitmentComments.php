<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecruitmentComments extends Model
{
    use HasFactory;
    protected $table = 'recruitment_comments';
    protected $fillable = ['*'];
}
