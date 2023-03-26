<?php

namespace App\Models\Resource;

use App\Models\Bot\SmsBot;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResourceBot extends Model
{
    use HasFactory;

    protected $guarded = false;
    protected $table = 'resource_bot';

    public function resource()
    {
        return $this->hasOne(SmsResource::class, 'id', 'resource_id');
    }

    public function bot()
    {
        return $this->hasOne(SmsBot::class, 'id', 'bot_id');
    }
}
