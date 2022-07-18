<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecruitmentInformation extends Model
{
    use HasFactory;

    protected $table = 'recruitment_information';
    protected $fillable = ['*'];

    public function User()
	{
	    return $this->hasOne(User::class,'id','user_id');
	}
    public function Interviewer()
	{
	    return $this->hasOne(Interviewer::class,'emp_id','interviewer');
	}
    public function RecInterviewerList()
	{
	    return $this->hasMany(RecInterviewerList::class,'rec_id','id');
	}


}
