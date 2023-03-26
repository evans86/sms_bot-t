<?php

namespace App\Models\Resource;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmsResource extends Model
{
    use HasFactory;

    protected $guarded = false;
    protected $table = 'resource';
}
