<?php

namespace App;

use App\Models\Demande_Assistance;
use App\Models\Evaluation_Garage;
use App\Models\Garage;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role','photo','status','provider','provider_id',
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

    public function orders(){
        return $this->hasMany('App\Models\Order');
    }
    public function garage(){
        return $this->belongsTo(Garage::class);
    }

    public function evaluation_garage(){
        return $this->hasMany(Evaluation_Garage::class);
    }
    public function demande_assisatnce(){
        return $this->hasMany(Demande_Assistance::class);
    }
}
