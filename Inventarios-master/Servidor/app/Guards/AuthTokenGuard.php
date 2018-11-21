<?php

namespace App\Guards;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Auth\TokenGuard;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class AuthTokenGuard extends TokenGuard
{
    public function __construct(UserProvider $provider, Request $request)
    {
        parent::__construct($provider, $request);
        $this->inputKey = 'authToken'; // if you want to rename this, as well
        $this->storageKey = 'ThoWAuthToken';
    }


    /**
     * Refresh the auth token for the user.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @return void
     */
    protected function refreshAuthToken(AuthenticatableContract $user)
    {
        $user->setAuthToken($token = Str::random(60));

        $user->updateAuthToken();

        //dd($user);
        //$this->provider->updateAuthToken($user, $token);
    }

    /**
     * Create a new Auth token for the user if one doesn't already exist.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @return void
     */
    protected function createAuthTokenIfDoesntExist(AuthenticatableContract $user)
    {
        if (empty($user->getAuthToken())) {
            $this->refreshAuthToken($user);
        }
    }


    /**
     * Log a user into the application.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  bool  $remember
     * @return void
     */
    public function login(AuthenticatableContract $user)
    {
        //$this->updateSession($user->getAuthIdentifier());

        // If the user should be permanently "remembered" by the application we will
        // queue a permanent cookie that contains the encrypted copy of the user
        // identifier. We will then decrypt this later to retrieve the users.
        // if ($remember) {
        //    $this->createRememberTokenIfDoesntExist($user);

        //    $this->queueRecallerCookie($user);
        //}

        // If we have an event dispatcher instance set we will fire an event so that
        // any listeners will hook into the authentication events and run actions
        // based on the login and logout events fired from the guard instances.
        //$this->fireLoginEvent($user, $remember);

        $this->createAuthTokenIfDoesntExist($user);

        $this->setUser($user);
    }

    /**
     * Attempt to authenticate a user using the given credentials.
     *
     * @param  array  $credentials
     * @param  bool   $remember
     * @param  bool   $login
     * @return bool
     */
    public function attempt(array $credentials = [])
    {
        //$this->fireAttemptEvent($credentials, $remember, $login);

        $user = $this->provider->retrieveByCredentials($credentials);

        // If an implementation of UserInterface was returned, we'll ask the provider
        // to validate the user against the given credentials, and if they are in
        // fact valid we'll log the users into the application and return true.
        if ($user) {
            $this->login($user);

            return true;
        }

        return false;
    }
}