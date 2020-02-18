<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\MailResetPasswordNotification as MailResetPasswordNotification;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'referral_code','username','name','real_account', 'phone', 'status','email', 'password','password_first','newslater','terms_and_conditions'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new MailResetPasswordNotification($token));
    }
    
    public function accountDemo()
    {
        return $this->hasMany('App\Models\MetaAccount','user_id','id');
    }
    
    public function userDetail()
    {
        return $this->hasOne('App\Models\UserDetail','user_id','id');
    }

    public function userReal()
    {
        return $this->hasMany('App\Models\RealAccount','user_id','id');
    }

    public function deposit()
    {
        return $this->hasMany('App\Models\Deposit','user_id','id');
    }
}
