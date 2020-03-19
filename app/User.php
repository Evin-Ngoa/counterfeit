<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

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

        /**
     * Scope a query to only include active users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function active($id)
    {
        // dd($id);
        if (isset($_COOKIE['logged_in_user'])) {
            $user = $_COOKIE['logged_in_user'];
            $cookieData = json_decode($_COOKIE['logged_in_user'],true);
            $userEmail = $cookieData['email'];
            if($id != $userEmail){
                // return Redirect::route('book.view', [$userEmail]);
                return false;
            }

            return true;
        }
    }
    
    /**
     * Get the logged email
     */
    public function scopeLoggedInUserEmail()
    {
        if (isset($_COOKIE['logged_in_user'])) {
            $user = $_COOKIE['logged_in_user'];
            $cookieData = json_decode($user,true);

            $userEmail = $cookieData['email'];

            return $userEmail;
        }   
    }
}
