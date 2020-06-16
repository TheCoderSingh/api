<?php

namespace Alunos\Auth\Traits;

use Exception;
use Illuminate\Http\Request;
use Laravel\Passport\Client;

trait InteractsWithOauth
{
    private function requestPasswordGrant(string $username, string $password, string $scope = '')
    {
        $client = Client
            ::where('password_client', true)
            ->whereNull('user_id')
            ->first();

        if ($client === null) {
            throw new Exception('OAuth Password Grant client not defined');
        }

        $request = Request::create('/oauth/token', 'POST', [
            'grant_type'    => 'password',
            'client_id'     => $client->id,
            'client_secret' => $client->secret,
            'username'      => $username,
            'password'      => $password,
            'scope'         => $scope,
        ]);

        // Internal request
        $response = app()
            ->handle($request)
            ->getContent();

        return json_decode($response, true);
    }
}
