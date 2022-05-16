<?php

namespace App\admin;

use Illuminate\Database\Eloquent\Model;

class BankBranch extends Model
{
    protected $fillable = [
        'name',
        'bank_id',
        'bank_routing',
        'district_id',
        'status'
    ];

    public function get_bank_name(){
        return $this->belongsTo(Bank::class, 'bank_id');
    }
    public function get_district_name(){
        return $this->belongsTo(District::class, 'district_id');
    }
}
