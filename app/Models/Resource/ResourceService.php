<?php

namespace App\Models\Resource;

use App\Models\Service\SmsService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResourceService extends Model
{
    use HasFactory;

    protected $guarded = false;
    protected $table = 'resource_service';

    public function resource()
    {
        return $this->hasOne(SmsResource::class, 'id', 'resource_id');
    }

    public function service()
    {
        return $this->hasOne(SmsService::class, 'id', 'service_id');
    }
}
