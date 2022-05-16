<?php

namespace App;

use App\admin\Ipo;
use Illuminate\Database\Eloquent\Model;
use App\User;

class IpoRequest extends Model
{
    public function client(){
        return $this->belongsTo(User::class, 'client_id');
    }
    public function ipo(){
        return $this->belongsTo(Ipo::class, 'ipo_id');
    }
}
