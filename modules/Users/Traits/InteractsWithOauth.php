<?php

namespace Alunos\Users\Traits;

use Illuminate\Http\Request;
use Laravel\Passport\Client;

trait InteractsWithOauth
{
    private function requestPasswordGrant(string $username, string $password)
    {
        $client = Client
            ::where('password_client', true)
            ->whereNull('user_id')
            ->first();

        $request = Request::create('/oauth/token', 'POST', [
            'grant_type'    => 'password',
            'client_id'     => $client->id,
            'client_secret' => $client->secret,
            'username'      => $username,
            'password'      => $password,
            'scope'         => '*',
        ]);

        $response = app()
            ->handle($request)
            ->getContent();

        return json_decode($response, true);
    }
}
