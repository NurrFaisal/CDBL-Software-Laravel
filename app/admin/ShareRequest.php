<?php

namespace App\admin;

use App\User;
use Illuminate\Database\Eloquent\Model;

class ShareRequest extends Model
{
    public function share(){
        return $this->belongsTo(Share::class, 'share_id');
    }
    public function client(){
        return $this->belongsTo(User::class, 'client_id');
    }
}
