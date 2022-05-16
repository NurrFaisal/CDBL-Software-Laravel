<?php

namespace App;

use App\admin\Share;
use Illuminate\Database\Eloquent\Model;
use App\User;

class ShareSellRequest extends Model
{
    public function share(){
        return $this->belongsTo(Share::class, 'share_id');
    }
    public function client(){
        return $this->belongsTo(User::class, 'client_id');
    }
}
