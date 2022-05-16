<?php

namespace App\admin;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable = [
        'name',
        'district_id',
        'division',
        'status'
    ];
    public function get_district_name(){
        return $this->belongsTo(District::class, 'district_id');
    }
}
