<?php

namespace App\Http\Controllers\Auth;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use Exception;
use Auth;
use DB;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
//    protected $redirectTo = '/home';
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    //======
      public function redirectToFacebook()
    {
          
         return Socialite::driver('facebook')->redirect();
    }
    public function handleFacebookCallback()
    {
    
        try{
        $socialUser = Socialite::driver('facebook')->user();
        //dd($socialUser->getId());
        }catch(\Exception $e){
            return redirect('/login');
        }
        $user=  User::where('facebook_id',$socialUser->getId())->first();
        if($user==null){
            /*
            User::created([
                'facebook_id'=>$socialUser->getId(),
                'name'=>$socialUser->getName(),
                'email'=>$socialUser->getEmail(),
            ]);*/
            DB::table('users')->insert([
            'name'=>$socialUser->getName(),
            'email'=>'fb'.$socialUser->getId().'@gamil.com',
            'address'=>'fb address',
            'password'=>'pass'.$socialUser->getId(),
             'facebook_id'=>$socialUser->getId(),
             
         ]);
          $insertedUser=  User::where('facebook_id',$socialUser->getId())->first(); 
           if(Auth::LoginUsingId($insertedUser->id)){
           return redirect()->intended('/dashboard');
        }else{
            return redirect('/login');
        }
        }
       
        else if(Auth::LoginUsingId($user->id)){
            return redirect()->intended('/dashboard');
        }
        

        // $user->token;
    }
        
         
}
