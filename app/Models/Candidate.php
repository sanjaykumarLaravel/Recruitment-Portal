<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;
    protected $table = 'candidates';
    protected $fillable = ['name','experience','technology','current_ctc','expected_ctc','notice_period','shortlisted','interviewed','offered','joined','status','skills'];
}
