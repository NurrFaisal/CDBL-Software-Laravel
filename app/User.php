<?php

namespace App;

use App\admin\AdminMapper;
use App\admin\AdminType;
use App\admin\Branch;
use App\admin\District;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function get_admin_type(){
        return $this->belongsTo(AdminType::class, 'admin_type');
    }
    public function get_district_name(){
        return $this->belongsTo(District::class, 'present_district');
    }
    public function get_branch_name(){
        return $this->belongsTo(Branch::class, 'branch');
    }
    public function ger_admin_mapper(){
        return $this->hasMany(AdminMapper::class, 'user_id');
    }
    public function get_bo_account_info(){
        return $this->belongsTo(BoAccount::class, 'bo_id');
    }
}
