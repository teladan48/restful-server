<?php

namespace App\Providers;

use Exception;
use App\Entities\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Boot the authentication services for the application.
     *
     * @return void
     */
    public function boot()
    {
        // Here you may define how you wish users to be authenticated for your Lumen
        // application. The callback which receives the incoming request instance
        // should return either a User instance or null. You're free to obtain
        // the User instance via an API token or any other method necessary.

        Auth::viaRequest('api', function (Request $request) {

            $authorization_header = explode(' ', $request->header('Authorization'));

            if (count($authorization_header) != 2 || strpos($authorization_header[0], 'Bearer')) {
                throw new Exception('Authorization header not set or invalid.');
            }

            $user = User::where('api_token', $authorization_header[1])->first();

            if (is_null($user)) {
                throw new Exception('Invalid access token.');
            }

            return $user;
        });
    }
}
