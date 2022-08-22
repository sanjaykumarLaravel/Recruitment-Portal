<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employees';
    protected $fillable = ['name','experience','technology','current_ctc','expected_ctc','notice_period','shortlisted','interviewed','offered','joined','status','skills'];
}
