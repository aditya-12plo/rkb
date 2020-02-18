<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;
    protected $table = 'admin';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id','name', 'status','email', 'password'
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
        $this->notify(new \App\Notifications\MailResetPasswordAdminNotification($token));
    }
    /**
     * Get the role record associated with the user.
     */
    public function role()
    {
        return $this->hasOne('App\Models\Role','id','role_id');
    }

    public function approveReal()
    {
        return $this->hasMany('App\Models\RealAccount','admin_id','id');
    }
    public function deposit()
    {
        return $this->hasMany('App\Models\Deposit','admin_id','id');
    }
}
