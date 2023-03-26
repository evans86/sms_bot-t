<?php

namespace App\Models\Resource;

use App\Models\Activate\SmsCountry;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResourceCountry extends Model
{
    use HasFactory;

    protected $guarded = false;
    protected $table = 'resource_country';

    public function resource()
    {
        return $this->hasOne(SmsResource::class, 'id', 'resource_id');
    }

    public function country()
    {
        return $this->hasOne(SmsCountry::class, 'id', 'country_id');
    }
}
