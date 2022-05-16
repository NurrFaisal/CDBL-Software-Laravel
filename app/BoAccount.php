<?php

namespace App;

use App\admin\Bank;
use App\admin\BankBranch;
use App\admin\Branch;
use App\admin\District;
use Illuminate\Database\Eloquent\Model;

class BoAccount extends Model
{
//    protected $fillable = ['district_id'];
    public function bo_city(){
        return $this->belongsTo(District::class, 'city');
    }
    public function bo_branch(){
        return $this->belongsTo(Branch::class,'branch' );
    }
    public function join_bo_city(){
        return $this->belongsTo(District::class, 'join_city');
    }
    public function bo_bank(){
        return $this->belongsTo(Bank::class, 'bank_name');
    }
    public function bank_city(){
        return $this->belongsTo(District::class, 'bank_district');
    }
    public function bank_branch_name(){
        return $this->belongsTo(BankBranch::class, 'bank_branch');
    }
    public function get_user(){
        return $this->belongsTo(User::class, 'id', 'bo_id');
    }

}
