<?php

namespace App\Models\Activate;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmsCountry extends Model
{
    use HasFactory;

    protected $guarded = false;
    protected $table = 'country';

    public function operators()
    {
        return $this->hasMany(SmsOperator::class, 'country_id', 'id');
    }
}
