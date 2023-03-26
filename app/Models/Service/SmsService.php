<?php

namespace App\Models\Service;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmsService extends Model
{
    use HasFactory;

    protected $guarded = false;
    protected $table = 'service';
}
