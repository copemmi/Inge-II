<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;


class User extends Authenticatable
{
    use Notifiable;

    protected $table='users';
    protected  $primaryKey = 'id';
    protected $fillable = [
        'name', 'email', 'password'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function routeNotificationForSlack()
    {
        //return $this->slack_url; 
        return 'https://hooks.slack.com/services/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'; 
    }
}