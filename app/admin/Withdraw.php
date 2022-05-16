<?php

namespace App\admin;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    public function user(){
        return $this->belongsTo(User::class, 'client_id');
    }
}
