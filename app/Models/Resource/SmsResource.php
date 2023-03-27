<?php

namespace App\Models\Resource;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmsResource extends Model
{
    use HasFactory;

    const ACTIVATE_ID = 1;
    const SIM5_ID = 2;

    protected $guarded = false;
    protected $table = 'resource';
}
