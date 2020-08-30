<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\SocialIdentity;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider($provider)
    {
        print_r(Socialite::driver($provider)->redirect());
        exit();
//        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        try {
            $user = Socialite::driver($provider)->user();
        }catch (Exception $exception){
            return redirect('/login');
        }

        $authUser = $this->findOrCreate($user, $provider);
        Auth::login($authUser, true);

        return redirect($this->redirectTo);
    }

    public function findOrCreate($providerUser, $provider)
    {
        $account = SocialIdentity::whereProviderName($provider)
            ->whereProviderId($providerUser->getId())
            ->first();
        if ($account){
            return $account->user;
        }

        $user = User::whereEmail($providerUser->getEmail())
            ->first();
        if (! $user){
            $user = User::create([
                'email' => $providerUser->getEmail(),
                'name' => $providerUser->getName()
            ]);
        }

        $user->identities()->create([
            'provider_id'   => $providerUser->getId(),
            'provider_name' => $provider,
        ]);

        return $user;
    }
}
