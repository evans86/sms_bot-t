<?php

namespace App\Models\Resource;

use App\Models\Activate\SmsCountry;
use App\Models\Service\SmsService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResourceServiceCountry extends Model
{
    use HasFactory;

    protected $guarded = false;
    protected $table = 'resource_service_country';

    public function resource()
    {
        return $this->hasOne(SmsResource::class, 'id', 'resource_id');
    }

    public function service()
    {
        return $this->hasOne(SmsService::class, 'id', 'service_id');
    }

    public function country()
    {
        return $this->hasOne(SmsCountry::class, 'id', 'country_id');
    }
}
