<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }


    public function Callback($provider)
    {
        $userSocial = Socialite::driver($provider)->stateless()->user();
        $users      = User::where(['email' => $userSocial->getEmail()])->first();
        if($users)
        {
            Auth::login($users);
            return redirect()->route('user.dashboard');
        }
        else
        {
        $user = User::create([
                    'name'          => $userSocial->getName(),
                    'email'         => $userSocial->getEmail(),
                    //'image'         => $userSocial->getAvatar(),
                    'provider_id'   => $userSocial->getId(),
                    'provider'      => $provider,
                ]);
             return redirect()->route('user.dashboard');
            }
    }

    // public function checkSocial(Request $request)
    // {
    //     $user = $request->user();
        
    //     if ($user) 
    //     {
    //         $token =  $user->createToken('myapptoken')->plainTextToken;
    //         return response()->json(['Access-token' =>'bearer  '. $token]);
    //     }
    //     else
    //     {
    //         return  response()->json(['access-denied',403]);
    //     }

    // }
}
