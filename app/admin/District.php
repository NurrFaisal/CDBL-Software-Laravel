<?php

namespace App\admin;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $fillable = [
        'name',
        'status'
    ];
}
