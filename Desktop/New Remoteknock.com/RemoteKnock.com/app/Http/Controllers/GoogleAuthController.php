<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
class GoogleAuthController extends Controller
{
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
        
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
            $finduser = User::where('google_id', $user->getId())->first();

            if($finduser){
                Auth::login($finduser);
                return redirect()->intended('/');
            }
            else{
                $newUser = User::updateOrCreate(['email' => $user->email],[
                    'name' => $user->name,
                    'google_id'=> $user->getId(),
                    'email'=>$user->getEmail(),
                    ]);
 
        
                Auth::login($newUser);
                return redirect()->intended('/');
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
