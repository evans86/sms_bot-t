<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmsUser extends Model
{
    use HasFactory;

    protected $guarded = false;
    protected $table = 'sms_users';
}
