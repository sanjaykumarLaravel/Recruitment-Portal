<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecInterviewerList extends Model
{
    use HasFactory;
    protected $table = 'rec_interviewer_list';
    protected $fillable = ['*'];

    public function Interviewer()
	{
	    return $this->hasOne(Interviewer::class,'emp_id','interviewer_id');
	}    
}
