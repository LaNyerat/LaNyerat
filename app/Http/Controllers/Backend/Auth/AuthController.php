<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Socialite;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    /**
     * User service binding variable
     *
     * @var void
     */
    protected $userService;

    /**
     * AuthController __construct
     *
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Return to provider login
     *
     * @param string $provider
     * @return mixed
     */
    public function redirectToProvider($provider = 'github')
    {
        return Socialite::driver($provider)->redirect();
    }

    public function providerCallback($provider = 'github')
    {
        $user = Socialite::driver($provider)->user();
        $authUser = $this->userService->findOrCreate($user, $provider);

        Auth::login($authUser, true);

        return redirect('/');
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new Response('', 204)
            : redirect('/');
    }
}