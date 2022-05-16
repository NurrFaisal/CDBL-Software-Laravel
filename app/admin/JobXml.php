<?php

namespace App\admin;

use Illuminate\Database\Eloquent\Model;

class JobXml extends Model
{
    public function get_dse(){
        return $this->hasOne(DseXml::class, 'security_code', 'security_code')->latest();
    }
    public function get_pe_ratio(){
        return $this->belongsTo(PeRatio::class, 'security_code', 'security_code');
    }
}
