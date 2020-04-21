<?php

namespace App;

use App\Http\Traits\UserConstants;
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
     * Get the names of the participants
     */
    public static function getParticipantNames(){
        if (isset($_COOKIE['logged_in_user'])) {
            $user = $_COOKIE['logged_in_user'];
            $cookieData = json_decode($user , true);
            $userRole = User::extractRole($cookieData['$class']);
            // dd($userRole);
            if( $userRole == \App\Http\Traits\UserConstants::ADMIN || 
                $userRole == \App\Http\Traits\UserConstants::PUBLISHER || 
                $userRole == \App\Http\Traits\UserConstants::DISTRIBUTOR){
                if(isset($cookieData['name'])){
                    $userName = $cookieData['name'];
                }
            }elseif($userRole == \App\Http\Traits\UserConstants::CUSTOMER){
                $firstName = $cookieData['firstName'];
                $lastName = $cookieData['lastName'];
                $userName = $firstName . " " . $lastName;
            }

            return $userName;
        }
    }

    /**
     * Get the first name of the customers
     */
    public static function getParticipantFirstName(){
        if (isset($_COOKIE['logged_in_user'])) {
            $user = $_COOKIE['logged_in_user'];
            $cookieData = json_decode($user , true);
            
            $firstName = $cookieData['firstName'];
            $lastName = $cookieData['lastName'];
            
            return $firstName;
        }
    }

    /**
     * Get the Last Name of the participant
     */
    public static function getParticipantLastName(){
        if (isset($_COOKIE['logged_in_user'])) {
            $user = $_COOKIE['logged_in_user'];
            $cookieData = json_decode($user , true);
            
            $firstName = $cookieData['firstName'];
            $lastName = $cookieData['lastName'];
            
            return $lastName;
        }
    }

    /**
     * Get the secret of the participant
     */
    public static function getParticipantSecret(){
        if (isset($_COOKIE['logged_in_user'])) {
            $user = $_COOKIE['logged_in_user'];
            $cookieData = json_decode($user , true);
            
            $secret = $cookieData['secret'];
            
            return $secret;
        }
    }

    /**
     * Get the memberId of the participant
     */
    public static function getParticipantMemberID(){
        if (isset($_COOKIE['logged_in_user'])) {
            $user = $_COOKIE['logged_in_user'];
            $cookieData = json_decode($user , true);
            
            $memberId = $cookieData['memberId'];
            
            return $memberId;
        }
    }

    /**
     * Get the memberId of the participant
     */
    public static function getParticipantUserName(){
        if (isset($_COOKIE['logged_in_user'])) {
            $user = $_COOKIE['logged_in_user'];
            $cookieData = json_decode($user , true);
            
            $userName = $cookieData['userName'];
            
            return $userName;
        }
    }

    /**
     * Get the Telephone of the customers
     */
    public static function getParticipantTelephone(){
        if (isset($_COOKIE['logged_in_user'])) {
            $user = $_COOKIE['logged_in_user'];
            $cookieData = json_decode($user , true);

            if(isset($cookieData['telephone'])){
                return $cookieData['telephone'];
            }

            return "";
        }
    }

    /**
     * Get the Country of the customers
     */
    public static function getParticipantAddCountry(){
        if (isset($_COOKIE['logged_in_user'])) {
            $user = $_COOKIE['logged_in_user'];
            $cookieData = json_decode($user , true);

            if(isset($cookieData['address'])){
                if(isset($cookieData['address']['country'])){
                    return $cookieData['address']['country'];
                }
            }

            return "-select country-";
        }
    }

    /**
     * Get the county of the customers
     */
    public static function getParticipantAddCounty(){
        if (isset($_COOKIE['logged_in_user'])) {
            $user = $_COOKIE['logged_in_user'];
            $cookieData = json_decode($user , true);

            if(isset($cookieData['address'])){
                if(isset($cookieData['address']['county'])){
                    return $cookieData['address']['county'];
                }
            }

            return "";
        }
    }

    /**
     * Get the street of the customers
     */
    public static function getParticipantAddPostal(){
        if (isset($_COOKIE['logged_in_user'])) {
            $user = $_COOKIE['logged_in_user'];
            $cookieData = json_decode($user , true);

            if(isset($cookieData['address'])){
                if(isset($cookieData['address']['street'])){
                    return $cookieData['address']['street'];
                }
            }
            return "";
        }
    }


    /**
     * Check if a user is loggedin
     */
    public static function checkAuth(){
        // if someone loggedin
        if (isset($_COOKIE['logged_in_user'])) {
            $userEmail = self::loggedInUserEmail();
            // $userEmail = "publisher1@gmail.com";
            $ifUserExistsBool = self::checkUser($userEmail);
            // dd($ifUserExistsBool);
            return $ifUserExistsBool;
        }
        return false;
    }

    /**
     * Check if remote user exists
     * in all participants
     */
    public static function checkUser($userEmail){
        $bool = false;
        $role = self::getUserRole();
        // $role = UserConstants::PUBLISHER;

        if($role == UserConstants::ADMIN){
            $bool = self::remoteUserCall(UserConstants::ADMIN, $userEmail);
        }

        if($role == UserConstants::CUSTOMER){
            $bool = self::remoteUserCall(UserConstants::CUSTOMER, $userEmail);
        }

        if($role == UserConstants::PUBLISHER){
            $bool = self::remoteUserCall(UserConstants::PUBLISHER, $userEmail);
        }

        if($role == UserConstants::DISTRIBUTOR){
            $bool = self::remoteUserCall(UserConstants::DISTRIBUTOR, $userEmail);
        }

        return $bool;

    }

    /**
     * Remote Api Call
     */
    public static function remoteUserCall($participant ,$userEmail){
        // Fetch remotely to confirm the user
        // coz the cookie might not expire but the remote user 
        // does not exist
        $get_data = self::callAPI('GET', 'http://localhost:3001/api/' . $participant.'/' .$userEmail, false);
        $response = json_decode($get_data, true);
        // dd($response);
        // $errors = $response['error']['statusCode'];
        if(isset($response['error']['statusCode'])){
            return false;
        }else{
            return true;
        }
    }

    /**
     * Check for image
     */
    public static function getUserProfile($authRole ,$email){
        // Fetch remotely to get user profile image
        // coz the cookie might not expire but the remote user 
        // does not exist
        // $get_data = User::callAPI('GET', 'http://localhost:3001/api/' .'upload'. $authRole .'ProfilePic', $data);
        $get_data = User::callAPI('GET', 'http://localhost:3001/api/'.$authRole .'/'. $email,false);
        $response = json_decode($get_data, true);
        // dd($response);
        if(isset($response['error']['statusCode'])){
            return 'None';
        }else{
            if(isset($response['avatar'])){
                return $response['avatar'];
            }
            return 'None';
        }
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

    public static function callAPI($method, $url, $data){
        $curl = curl_init();
        switch ($method){
           case "POST":
              curl_setopt($curl, CURLOPT_POST, 1);
              if ($data)
                 curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
              break;
           case "PUT":
              curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
              if ($data)
                 curl_setopt($curl, CURLOPT_POSTFIELDS, $data);			 					
              break;
           default:
              if ($data)
                 $url = sprintf("%s?%s", $url, http_build_query($data));
        }
        // OPTIONS:
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
           'APIKEY: 111111111111111111111',
           'Content-Type: application/json',
        ));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        // EXECUTE:
        $result = curl_exec($curl);
        if(!$result){die("Connection Failure");}
        curl_close($curl);
        return $result;
     }
}
