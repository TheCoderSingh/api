<?php

namespace Alunos\Users\Mutations;

use Alunos\Users\Traits\InteractsWithOauth;
use App\Exceptions\ValidationException;
use GraphQL\Type\Definition\ResolveInfo;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;

class LoginByEmail
{
    use InteractsWithOauth;

    /**
     * Return a value for the field.
     *
     * @param $rootValue
     * @param array $payload
     * @param GraphQLContext $context
     * @param ResolveInfo $resolveInfo
     * @return mixed
     */
    public function __invoke($rootValue, array $payload, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $credentials = Arr::only($payload['credentials'], ['email', 'password']);

        if (!Auth::attempt($credentials)) {
            throw ValidationException::withMessages(['validation' => 'Invalid credentials']);
        }

        $token = $this->requestPasswordGrant($credentials['email'], $credentials['password']);

        return [
            'token_type' => $token['token_type'],
            'expires_in' => $token['expires_in'],
            'access_token' => $token['access_token'],
            'refresh_token' => $token['refresh_token'],
            'user' => Auth::user()->toArray()
        ];
    }
}
