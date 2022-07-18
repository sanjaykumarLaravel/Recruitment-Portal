<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerifiedUsersInformation extends Model
{
    use HasFactory;
    protected $table = 'verified_users_information';
    protected $fillable = ['*'];
}
