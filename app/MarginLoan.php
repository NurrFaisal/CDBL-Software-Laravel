<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MarginLoan extends Model
{
    public function get_user_name(){
        return $this->belongsTo(User::class, 'client_id');
    }
}
