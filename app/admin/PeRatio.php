<?php

namespace App\admin;

use Illuminate\Database\Eloquent\Model;

class PeRatio extends Model
{
    protected $fillable = ['date', 'bo_id', 'security_code', 'ratio'];
}
