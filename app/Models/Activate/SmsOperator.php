<?php

namespace App\Models\Activate;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmsOperator extends Model
{
    use HasFactory;

    protected $guarded = false;
    protected $table = 'sms_operators';

}
