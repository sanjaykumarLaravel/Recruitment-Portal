<?php
   
namespace App\Http\Controllers\Auth;
   
use App\Http\Controllers\Controller;
use Socialite;
use Auth;
use Exception;
use App\Models\User;
use App\Models\VerifiedUsersInformation;
use Illuminate\Support\Facades\Hash;
use Redirect;
use Mail;
use Log;

class GoogleSocialiteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
       
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleCallback()
    {
        try {
     		
            $user = Socialite::driver('google')->user();
            $getUserId = strstr($user->email,'@',true);

            $finduser = User::where('social_id', $user->id)->first();
      
            if($finduser){
                Auth::login($finduser);
                return redirect()->intended('/home');
                // return redirect('/home');
            }else{

                $findEmployeeType = VerifiedUsersInformation::where('user_name', $getUserId)->first();
                
                if($findEmployeeType)
                {
                    $newUser = User::updateOrCreate([
                        'name' => $user->name,
                        'email' => $user->email,
                        'employee_type'=> $findEmployeeType->role_id,
                        'social_id'=> $user->id,
                        'social_type'=> 'google',
                        'password' => Hash::make('12345678')
                    ]);
                    
                    Auth::login($newUser);
          
                    // return redirect('/home');
                    return redirect()->intended('/home');
                }
                else
                {
                    $error = "Sorry! you are not authorised for this application.";    
                    return Redirect::to('login')->withErrors($error);
                }
            }
     
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    public function email()
    {
        try{
            $email = array('sanjay.kumar@netprophetsglobal.com','jugendra.singh@netprophetsglobal.com');
            $data = ['name' => 'bar','designation'=>'daf'];
            $name = 'sanjay';
            Mail::send('email.request', $data, function($message) use ($email, $name) {
                $message->to($email);
                $message->from('hrd@netprophetsglobal.com', 'hrd'); 
                $message->subject('Hi there');
            });
            if (Mail::failures()) {
                echo 'Mail not send.';
            }
            else
            {
                echo 'success';
            }
        }
        catch(Exception $e){
            Log::info('Email Failed :'.$e);
        }
    }
}