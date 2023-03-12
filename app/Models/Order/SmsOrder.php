<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmsOrder extends Model
{
    use HasFactory;

    protected $guarded = false;
    protected $table = 'sms_orders';
}
