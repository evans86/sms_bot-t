<?php

namespace App\Models\Order;

use App\Models\Activate\SmsCountry;
use App\Models\User\SmsUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmsOrder extends Model
{
    use HasFactory;

    protected $guarded = false;
    protected $table = 'order';

    public function user()
    {
        return $this->hasOne(SmsUser::class, 'id', 'user_id');
    }

    public function country()
    {
        return $this->hasOne(SmsCountry::class, 'id', 'country_id');
    }
}
