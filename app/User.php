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
            $cookieData = json_decode($_COOKIE['logged_in_user'], true);
            $userEmail = $cookieData['email'];
            if ($id != $userEmail) {
                // return Redirect::route('book.view', [$userEmail]);
                return false;
            }

            return true;
        }
    }

    /**
     * Reads the role of user
     */
    public static function getUserRole(){
        if (isset($_COOKIE['logged_in_user'])) {
            $user = $_COOKIE['logged_in_user'];
            $cookieData = json_decode($user , true);
            $userRole = User::extractRole($cookieData['$class']);

            return $userRole;
        }
    }

    /**
     * Check if a user is loggedin
     */
    public static function checkAuth(){
        if (isset($_COOKIE['logged_in_user'])) {
            return true;
        }
        return false;
    }

    /*
     * Get Email from resource
     * resource:org.evin.book.track.Customer#toneevin07@gmail.com
     */
    public static function extractEmailFromResource($resource){
        $email = "";
        // Check if # Exists before exctracting the email
        if (($pos = strpos($resource, "#")) !== FALSE) { 

            //Get the string after the # character
            $email = substr($resource, $pos + 1 ); 
        }
        return $email;
    }
    
    /**
     * Get the logged email
     */
    public function scopeLoggedInUserEmail()
    {
        if (isset($_COOKIE['logged_in_user'])) {
            $user = $_COOKIE['logged_in_user'];
            $cookieData = json_decode($user, true);

            $userEmail = $cookieData['email'];

            return $userEmail;
        }
    }

    /**
     * Function to extract role
     */
    public static function extractRole($str)
    {

        // Your string
        // $str = "I like to eat apple";
        // Split it into pieces, with the delimiter being a space. This creates an array.
        $split = explode(".", $str);
        // Get the last value in the array.
        // count($split) returns the total amount of values.
        // Use -1 to get the index.
        return $split[count($split) - 1];
    }
}
